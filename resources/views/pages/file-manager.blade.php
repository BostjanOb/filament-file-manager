<x-filament-panels::page>
    @livewire(BostjanOb\FilamentFileManager\Components\FileList::class, ['disk' => $this->getDisk(), 'path' => $this->getPath()])
</x-filament-panels::page>
