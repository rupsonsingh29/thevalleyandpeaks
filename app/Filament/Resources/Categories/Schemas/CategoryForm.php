<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Filament\Forms\Components\FileUpload;

class CategoryForm
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
                Select::make('type')->options(['nepal' => 'Nepal', 'international' => 'International'])->required()->preload(),
                Select::make('parent_id')->relationship('parent', 'name')->searchable()->preload(),
                Textarea::make('description')->rows(3)->columnSpanFull(),
                FileUpload::make('featured_image')->image()->disk('public')->directory('categories'),
                TextInput::make('meta_title')->columnSpanFull(),
                Textarea::make('meta_description')->rows(2)->columnSpanFull(),
                TextInput::make('sort_order')->numeric()->default(0),
            ])->columnSpanFull(),
        ]);
    }
}
