<?php

namespace BostjanOb\FilamentFileManager\Pages;

use Filament\Pages\Page;

class FileManager extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    protected static string $view = 'filament-file-manager::pages.file-manager';

    public function getDisk(): string
    {
        return config('filesystems.default');
    }

    public function getPath(): string
    {
        return '';
    }
}
