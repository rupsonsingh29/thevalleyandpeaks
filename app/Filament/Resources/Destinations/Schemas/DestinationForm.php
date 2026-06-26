<?php

namespace App\Filament\Resources\Destinations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class DestinationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Details')->schema([
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                Select::make('type')->options(['nepal' => 'Nepal', 'international' => 'International'])->required()->live(),
                Select::make('continent')->options([
                    'asia' => 'Asia',
                    'europe' => 'Europe',
                    'north-america' => 'North America',
                    'south-america' => 'South America',
                    'africa' => 'Africa',
                    'oceania' => 'Oceania',
                ])->visible(fn ($get) => $get('type') === 'international'),
                TextInput::make('country')->visible(fn ($get) => $get('type') === 'international'),
                Textarea::make('excerpt')->rows(3)->columnSpanFull(),
                RichEditor::make('content')->columnSpanFull(),
                FileUpload::make('featured_image')->image()->disk('public')->directory('destinations'),
                Toggle::make('is_featured'),
                TextInput::make('sort_order')->numeric()->default(0),
            ])->columns(2),

            Section::make('SEO')->schema([
                TextInput::make('meta_title')->columnSpanFull(),
                Textarea::make('meta_description')->rows(2)->columnSpanFull(),
            ]),

            Section::make('FAQs')->schema([
                Repeater::make('faqs')
                    ->relationship()
                    ->schema([
                        TextInput::make('question')->required(),
                        Textarea::make('answer')->required()->rows(3),
                        TextInput::make('sort_order')->numeric()->default(0),
                    ])
                    ->orderColumn('sort_order')
                    ->collapsible()
                    ->columnSpanFull(),
            ]),
        ]);
    }
}
