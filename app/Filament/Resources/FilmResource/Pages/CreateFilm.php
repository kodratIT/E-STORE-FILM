<?php

namespace App\Filament\Resources\FilmResource\Pages;

use Filament\Actions;
use App\Filament\Resources\FilmResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateFilm extends CreateRecord
{
    protected static string $resource = FilmResource::class;


    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Film Created')
            ->body('The Film has been created successfully.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
