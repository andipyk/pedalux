<?php

namespace App\Filament\Resources\CoursePackageResource\Pages;

use App\Filament\Resources\CoursePackageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoursePackages extends ListRecords
{
    protected static string $resource = CoursePackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
