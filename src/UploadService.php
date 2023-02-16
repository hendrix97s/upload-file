<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use stdClass;

class UploadService
{
  public static function putFile(string $disk, object $file)
  {
    $storage = new stdClass();
    $storage->file  = Storage::putFile($disk, $file);
    self::setNameFile($storage);
    self::setUrlFile($storage, $disk);
    return $storage;
  }

  private static function setNameFile(object &$storage):void
  {
    $storage->name = explode('/', $storage->file);
    $storage->name = end($name);
  } 

  private static function setUrlFile(object &$storage, $disk):void
  {
    $storage->url = Storage::disk($disk)->url($storage->name);
  }
}
