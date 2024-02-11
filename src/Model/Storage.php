<?php

namespace BostjanOb\FilamentFileManager\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage as StorageDisk;
use Illuminate\Support\Str;
use Sushi\Sushi;

class Storage extends Model
{
    use Sushi;

    protected static string $disk = 'public';

    protected static string $path = '';

    protected $schema = [
        'name' => 'string',
        'dateModified' => 'datetime',
        'size' => 'integer',
        'type' => 'string',
    ];

    public static function queryForDiskAndPath(string $disk = 'public', string $path = ''): Builder
    {
        static::$disk = $disk;
        static::$path = $path;

        return static::query();
    }

    public function getRows(): array
    {
        $backPath = [];
        if (self::$path) {
            $path = Str::of(self::$path)->explode('/');

            $backPath = [
                [
                    'name' => '..',
                    'dateModified' => null,
                    'size' => null,
                    'type' => 'Folder',
                    'path' => $path->count() > 1 ? $path->take($path->count() - 1)->join('/') : '',
                ],
            ];
        }

        return collect($backPath)->push(
            ...collect(StorageDisk::disk(static::$disk)->directories(static::$path))
                ->sort()
                ->map(function (string $directory): array {
                    return [
                        'name' => Str::remove(self::$path.'/', $directory),
                        'dateModified' => StorageDisk::disk('public')->lastModified($directory),
                        'size' => null,
                        'type' => 'Folder',
                        'path' => $directory,
                    ];
                }),
            ...collect(StorageDisk::disk('public')->files(static::$path))
                ->sort()
                ->map(function (string $file): array {
                    return [
                        'name' => Str::remove(self::$path.'/', $file),
                        'dateModified' => StorageDisk::disk('public')->lastModified($file),
                        'size' => StorageDisk::disk('public')->size($file),
                        'type' => StorageDisk::disk('public')->mimeType($file) ?: null,
                        'path' => $file,
                    ];
                })
        )->toArray();
    }
}
