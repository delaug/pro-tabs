<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string getTabsPath()
 * @method static string[] getAllowedExtensions()
 * @method static array|bool upload(UploadedFile $file)
 * @method static array|bool download(Integer $id)
 * @method static void delete(string $url)
 * @method static string|string[] parseStrFirstToUpper(string $str)
 * @method static import(int $limit = null)
 * @see FilesService
 */
class FilesFacade extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'filesService';
    }
}
