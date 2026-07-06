<?php

namespace App\Filament\RichEditorPlugins;

use App\TiptapExtensions\HeadingId;
use Filament\Forms\Components\RichEditor\Plugins\Contracts\RichContentPlugin;
use Filament\Support\Facades\FilamentAsset;

class HeadingIdPlugin implements RichContentPlugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getTipTapPhpExtensions(): array
    {
        return [app(HeadingId::class)];
    }

    public function getTipTapJsExtensions(): array
    {
        return [FilamentAsset::getScriptSrc('rich-content-plugins/heading-id')];
    }

    public function getEditorTools(): array
    {
        return [];
    }

    public function getEditorActions(): array
    {
        return [];
    }
}