<?php

namespace App\Services;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string getErrorText(Int $err)
 * @method static string getTmpPath()
 * @method static string getTabsPath()
 * @method static array upload(UploadedFile $file)
 * @method static int|string move($url, $tab_id, $force = false)
 * @method static void clean()
 * @method static void delete(string $url)
 * @method static string|string[] parseStrFirstToUpper(string $str)
 * @method static import(int $limit = null, bool $debug = false)
 *
 * @see FilesService
 */
class FilesFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'filesService';
    }
}
