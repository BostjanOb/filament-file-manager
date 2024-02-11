<?php

namespace BostjanOb\FilamentFileManager\Pages;

use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class FileManager extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    protected static string $view = 'filament-file-manager::pages.file-manager';

    public function getHeading(): string|Htmlable
    {
        return 'File manager';
    }

    public static function getNavigationLabel(): string
    {
        return 'File manager';
    }
}
