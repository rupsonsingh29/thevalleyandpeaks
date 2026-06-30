<?php

namespace App\Filament\Resources\NewsletterSubscribers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Helpers\DateHelper;

class NewsletterSubscribersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')->searchable()->sortable(),
                // TextColumn::make('name'),
                TextColumn::make('subscribed_at')->dateTime()->sortable(),
            ])
            ->defaultSort('subscribed_at', 'desc')
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ]);
    }
}
