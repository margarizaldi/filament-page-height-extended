<?php

namespace App\Filament\Resources\TestModelResourceSection\Pages;

use App\Filament\Resources\TestModelResourceSection;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTestModel extends CreateRecord
{
    protected static string $resource = TestModelResourceSection::class;
}
