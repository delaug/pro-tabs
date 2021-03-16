<?php

namespace App\Services;

use App\Models\Band;
use App\Models\File;
use App\Models\Tab;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FilesService
{
    /**
     * Base public path
     * @var string
     */
    private $tabsPath = 'public/tabs';

    public $importCatalog = 'public/import';

    /**
     * Allowed file extensions
     *
     * @var string[]
     */
    private $allowedExtensions = ['gtp', 'gp3', 'gp4', 'gp5', 'gpx', 'gp'];

    /**
     * Get public path
     *
     * @return string
     */
    public function getTabsPath()
    {
        return $this->tabsPath;
    }

    /**
     * Get Allowed file Extensions
     *
     * @return string[]
     */
    public function getAllowedExtensions()
    {
        return $this->allowedExtensions;
    }

    /**
     * Upload file
     *
     * @param UploadedFile $file
     * @return array|bool
     */
    public function upload(UploadedFile $file)
    {
        $hash = $file->hashName();
        $path = $file->storeAs($this->tabsPath . '/' . $hash[0], $hash);

        if ($path) {
            $id = File::create([
                'path' => $path,
                'name' => $file->getClientOriginalName(),
                'extension' => $file->getClientOriginalExtension(),
                'size' => $file->getSize()
            ]);

            return [
                'id' => $id,
                'path' => str_replace($this->tabsPath . '/', '', $path)
            ];
        }

        return false;
    }

    /**
     * Download file
     *
     * @param $id
     * @return array|bool
     */
    public function download($id)
    {
        $file = File::find($id);

        if ($file && Storage::exists($file->path)) {
            return [
                'id' => $file->id,
                'path' => str_replace('public', 'storage', $file->path),
                'name' => $file->name
            ];
        }

        return false;
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
     * Parse string, first char to upper
     *
     * @param String $str
     * @return string|string[]
     */
    public function parseStrFirstToUpper(String $str)
    {
        // Replace
        $str = str_replace('_', ' ', $str);
        // First to upper
        $fc = mb_convert_case(mb_substr($str, 0, 2), MB_CASE_TITLE, 'utf-8');
        $str[0] = $fc;
        // Normalize title
        $str = preg_replace('/(\d+)$/', '($1)', $str);
        $str = str_replace(['don t', 'Don t'], ['don\'t', 'Don\'t'], $str);

        return $str;
    }

    /**
     *  Import tabs, bands from files. Search file into $importCatalog
     *
     * @param int $limit
     */
    public function import($limit = null)
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

                // Make titles with uppercase first char
                $bandName = self::parseStrFirstToUpper($match[1]);
                $tabTitle = self::parseStrFirstToUpper($match[2]);

                // Get or create Band
                $band = Band::firstOrCreate(['name' => $bandName]);

                // File prepare data
                $storagePath = storage_path('app/' . $path);

                $fileHash = \Illuminate\Support\Facades\File::hash($storagePath) . '.bin';
                $fileName = \Illuminate\Support\Facades\File::name($storagePath);
                $fileExtension = \Illuminate\Support\Facades\File::extension($storagePath);
                $fileSize = \Illuminate\Support\Facades\File::size($storagePath);
                $fileNewPath = $this->tabsPath . '/' . $fileHash[0] . '/' . $fileHash;
                Storage::copy($path, $fileNewPath);

                // Create File
                $file = File::create([
                    'path' => $fileNewPath,
                    'name' => $fileName . '.' . $fileExtension,
                    'extension' => $fileExtension,
                    'size' => $fileSize
                ]);

                // Create Tab
                $tab = Tab::create([
                    'title' => $tabTitle,
                    'band_id' => $band->id,
                    'file_id' => $file->id,
                ]);

                $arSuccess[] = [
                    'path' => $path,
                    'band' => $bandName,
                    'title' => $tabTitle,
                    'tab_id' => $tab->id
                ];

                // Break logic
                if (!empty($limit) && count($arSuccess) >= $limit)
                    break;

                if (count($arSuccess) % 500 == 1)
                    echo 'import: ' . count($arSuccess) . '...' . PHP_EOL;
            } else {
                $arErrors[] = [
                    'path' => $path,
                ];
            }
        }


        echo 'Import: Success (' . count($arSuccess) . '), Errors (' . count($arErrors) . ')' . PHP_EOL;
    }
}
