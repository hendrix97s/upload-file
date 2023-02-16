# To Laravel - UPLOAD FILE

## Create driver in filesystems.php

``` php

'disk' => [
  'disk_example' => [
    'driver' => 'local',
    'root' => storage_path('app/disk_example'),
    'url' => env('APP_URL').'/disk_example',
    'throw' => false,
  ],
]
```

## Register symbol link in filesystems.php

``` php

'links' => [
  public_path('disk_example') => storage_path('app/disk_example'),
]
```

## Run symbol link

``` bash
php artisan storage:link
```

## Usage class example

``` php

use App\Services\UploadService;

class Example {

 public function saveFile(Request $request)
 {
    return UploadService::putFile('disk_example', $request->file)
 }
}
```

