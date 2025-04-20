<?php

namespace App\Filament\Resources\DonationHistoryResource\Pages;

use App\Filament\Resources\DonationHistoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDonationHistory extends EditRecord
{
    protected static string $resource = DonationHistoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
