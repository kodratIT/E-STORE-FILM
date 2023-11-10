<?php

namespace App\Filament\Resources\FilmResource\Pages;

use Filament\Actions;
use App\Filament\Resources\FilmResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditFilm extends EditRecord
{
    protected static string $resource = FilmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Film updated')
            ->body('The Film has been saved successfully.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
