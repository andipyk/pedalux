<?php

namespace App\Filament\Resources\CoursePackageResource\Pages;

use App\Filament\Resources\CoursePackageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCoursePackage extends EditRecord
{
    protected static string $resource = CoursePackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $data;
    }
}
