<?php

namespace App\Filament\Resources\TestModelResourceSection\Pages;

use App\Filament\Resources\TestModelResourceSection;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTestModels extends ListRecords
{
    protected static string $resource = TestModelResourceSection::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
