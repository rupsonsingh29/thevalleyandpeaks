<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DateTimePicker;
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

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Content')->schema([
                TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                TextInput::make('slug')->required()->unique(ignoreRecord: true),
                Textarea::make('excerpt')->rows(3)->columnSpanFull(),
                RichEditor::make('content')->required()->columnSpanFull(),
                FileUpload::make('featured_image')->image()->directory('articles')->columnSpanFull(),
            ])->columns(2),

            Section::make('Classification')->schema([
                Select::make('author_id')->relationship('author', 'name')->required()->searchable(),
                Select::make('category_id')->relationship('category', 'name')->required()->searchable(),
                Select::make('destinations')->relationship('destinations', 'name')->multiple()->searchable(),
                TextInput::make('reading_time')->numeric()->default(5)->suffix('min'),
                Select::make('status')->options(['draft' => 'Draft', 'published' => 'Published'])->required(),
                Toggle::make('is_featured'),
                Toggle::make('is_trending'),
                DateTimePicker::make('published_at'),
                DateTimePicker::make('content_updated_at'),
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
