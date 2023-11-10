<?php

namespace App\Filament\Resources\ActorResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use App\Filament\Resources\ActorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateActor extends CreateRecord
{
    protected static string $resource = ActorResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Actor Created')
            ->body('The Actor has been created successfully.');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
