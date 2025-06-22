<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Filament\Resources\StudentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class EditStudent extends EditRecord
{
    protected static string $resource = StudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $user_data = $this->record->user->toArray();
        $data['user'] = $user_data;
        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $userData = Arr::pull($data, 'user');
        $record->update($data);
        $user = $record->user;

        if ($user) {
            $user->update($userData);
        }

        return $record;
    }


    protected function afterSave(): void
    {
        $this->record->refresh();
        $this->record->user->refresh();
    }
}
