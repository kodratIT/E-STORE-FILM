<?php

namespace App\Filament\Resources\CitiesResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use App\Filament\Resources\CitiesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCities extends CreateRecord
{
    protected static string $resource = CitiesResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('City Created')
            ->body('The City has been Created successfully.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
