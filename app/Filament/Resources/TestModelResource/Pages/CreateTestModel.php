<?php

namespace App\Filament\Resources\TestModelResource\Pages;

use App\Filament\Resources\TestModelResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTestModel extends CreateRecord
{
    protected static string $resource = TestModelResource::class;
}
