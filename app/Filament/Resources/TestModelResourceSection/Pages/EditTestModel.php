<?php

namespace App\Filament\Resources\TestModelResourceSection\Pages;

use App\Filament\Resources\TestModelResourceSection;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestModel extends EditRecord
{
    protected static string $resource = TestModelResourceSection::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
