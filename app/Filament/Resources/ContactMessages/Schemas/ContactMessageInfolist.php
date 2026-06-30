<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ContactMessageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('email'),
                TextEntry::make('subject'),
                TextEntry::make('inquiry_type'),
                TextEntry::make('message')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime(),
            ]);
    }
}