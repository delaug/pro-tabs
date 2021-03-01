<?php

namespace App\Services;

use App\Models\Band;
use App\Models\Tab;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\String_;

class FilesService
{
    public const ERR_TMP_FILE_NOT_FOUND = 1;
    public const ERR_TAB_FILE_EXIST = 2;
    public const ERR_CANT_MOVE = 3;

    public $tmpPath = 'public/tmp';
    public $tabsPath = 'public/tabs';
    public $importCatalog = 'public/import';
    public $spacer = '_';

    /**
     * Expire in seconds
     *
     * @var int
     */
    public $expire = 30;

    /**
     * Get text error
     *
     * @param $err
     * @return string
     */
    public function getErrorText($err)
    {
        $errors = [
            1 => 'Tmp file not found',
            2 => 'Tab file already exist',
            3 => 'Can\'t move file',
        ];
        return $errors[$err];
    }

    /**
     * Upload file to tmp dir
     *
     * @param UploadedFile $file
     * @return array
     */
    public function upload(UploadedFile $file)
    {
        $url = $file->storeAs($this->tmpPath, now()->format('YmdHis') . $this->spacer . $file->getClientOriginalName());
        return ['url' => str_replace($this->tmpPath . '/', '', $url)];
    }

    /**
     * Move file from tmp to tab dirs
     *
     * @param $url
     * @param $tab_id
     * @param bool $force
     * @return int|string
     */
    public function move($url, $tab_id, $force = false)
    {
        // Check tmp file
        if (!Storage::exists("{$this->tmpPath}/{$url}"))
            return self::ERR_TMP_FILE_NOT_FOUND;

        $fullName = preg_replace("/.*\//", '', $url);
        preg_match('/(\d{14})_(.*)/', $fullName, $fileData);

        /*
         *  1. Get error if exist
         *  2. Remove file and move new file after that
         */
        if (!$force) {
            // Check tab file
            if (Storage::exists("{$this->tabsPath}/{$tab_id}/{$fileData[2]}"))
                return self::ERR_TAB_FILE_EXIST;
        } else {
            self::delete("{$this->tabsPath}/{$tab_id}/{$fileData[2]}");
        }

        if (!Storage::move("{$this->tmpPath}/{$url}", "{$this->tabsPath}/{$tab_id}/{$fileData[2]}"))
            return self::ERR_CANT_MOVE;
        else
            return "{$this->tabsPath}/{$tab_id}/{$fileData[2]}";
    }

    /**
     *  Check time tmp files and delete if current time older then time create + expire
     */
    public function clean()
    {
        $tmpFiles = Storage::allFiles($this->tmpPath);

        // Check tmp files
        foreach ($tmpFiles as $tmpFile) {
            $fullName = preg_replace("/.*\//", '', $tmpFile);
            preg_match('/(\d{14})_(.*)/', $fullName, $fileData);

            // Delete expired file
            if (now() > Carbon::createFromFormat('YmdHis', $fileData[1])->addSecond($this->expire))
                Storage::delete($tmpFile);
        }

    }

    /**
     *  Delete file if exist
     *
     * @param string $url
     */
    public function delete($url)
    {
        Storage::exists($url) && Storage::delete($url);
    }

    /**
     *  Import tabs, bands from files.
     *  Search file into $importCatalog
     */
    public function import()
    {
        $paths = Storage::allFiles($this->importCatalog);

        $arSuccess = [];
        $arErrors = [];
        foreach ($paths as $path) {
            preg_match('/.*\/(.*)\/(.*)\./', $path, $match);

            // Clean
            $match[1] = trim($match[1]);
            $match[2] = trim($match[2]);

            if (count($match) == 3 && strlen($match[1]) && strlen($match[2])) {
                // Make band with uppercase first char
                $bandName = mb_convert_case($match[1], MB_CASE_TITLE, 'utf-8');

                // Title
                $tabTitle = str_replace('_', ' ', $match[2]);
                $fc = mb_convert_case(mb_substr($tabTitle, 0, 2), MB_CASE_TITLE, 'utf-8');
                $tabTitle[0] = $fc;
                // Normalize title
                $tabTitle = preg_replace('/(\d+)$/', '($1)', $tabTitle);
                $tabTitle = str_replace(['don t','Don t'], ['don\'t','Don\'t'], $tabTitle);

                // Get or create Band
                $band = Band::firstOrCreate(['name' => $bandName]);

                // Prepare file
                $newID = Tab::max('id') + 1;
                $fileName = preg_replace("/.*\//", '', $path);
                $src = "{$this->tabsPath}/{$newID}/{$fileName}";

                // Delete if exist file
                Storage::exists($src) && Storage::delete($src);

                Storage::copy($path, $src);

                // Create Tab
                $tab = Tab::create([
                    'title' => $tabTitle,
                    'band_id' => $band->id,
                    'src' => $src,
                ]);

                $arSuccess[] = [
                    'path' => $path,
                    'band' => $bandName,
                    'title' => $tabTitle,
                    'tab' => $tab
                ];
            } else {
                $arErrors[] = [
                    'path' => $path,
                ];
            }
        }


        echo 'Import: Success (' . count($arSuccess) . '), Errors (' . count($arErrors) . ')' . PHP_EOL;
    }
}
