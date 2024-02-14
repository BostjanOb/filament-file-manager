# Filament File Manager

This package provides a Filament page as a simple file manager.

## Installation

You can install the package via composer:

```bash
composer require bostjanob/filament-fila-manager
```

## Usage

Extend the page class and override the `getDisk` method.

```php
<?php

namespace App\Filament\Pages;

use BostjanOb\FilamentFileManager\Pages\FileManager;

class PublicFileManager extends FileManager
{
    protected static ?string $navigationLabel = 'Public files';

    public function getDisk(): string
    {
        return 'public';
    }
}
```

If you want to change default folder, override the `getPath` method.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.