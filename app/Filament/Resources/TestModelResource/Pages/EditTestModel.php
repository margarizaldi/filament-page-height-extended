<?php

namespace App\Filament\Resources\TestModelResource\Pages;

use App\Filament\Resources\TestModelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestModel extends EditRecord
{
    protected static string $resource = TestModelResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
