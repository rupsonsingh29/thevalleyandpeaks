<?php

namespace App\Filament\Resources\Authors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class AuthorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()->schema([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                TextInput::make('email')->email(),
                TextInput::make('title'),
                Textarea::make('bio')->rows(4)->columnSpanFull(),
                FileUpload::make('avatar')->image()->disk('public')->directory('authors'),
                TextInput::make('instagram')->url(),
                TextInput::make('twitter')->url(),
                TextInput::make('facebook')->url(),
                TextInput::make('linkedin')->url(),
            ])->columnSpanFull(),
        ]);
    }
}
