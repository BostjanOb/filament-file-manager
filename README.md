# Filament File Manager

This package provides a Filament page as a simple file manager.

## Installation

You can install the package via composer:

```bash
composer require bostjanob/filament-fila-manager
```

## Usage

Extend the page class and set `$disk` property to the disk you want to manage.

```php
<?php

namespace App\Filament\Pages;

use BostjanOb\FilamentFileManager\Pages\FileManager;

class PublicFileManager extends FileManager
{
    protected static ?string $navigationLabel = 'Public files';
    
    protected string $disk = 'public';
}
```

If you want to change default folder, override the `$path` property.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
