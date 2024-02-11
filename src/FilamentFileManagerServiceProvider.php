<?php

namespace BostjanOb\FilamentFileManager;

use BostjanOb\FilamentFileManager\Components\FileList;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentFileManagerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('filament-file-manager')
            ->hasViews();
    }

    public function packageBooted(): void
    {
        Livewire::component('file-list', FileList::class);
    }
}
