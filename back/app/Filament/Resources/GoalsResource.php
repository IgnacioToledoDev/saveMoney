<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GoalsResource\Pages;
use App\Filament\Resources\GoalsResource\RelationManagers;
use App\Models\Enums\FilamentCategoryMenu;
use App\Models\Goal;
use App\Models\Goals;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GoalsResource extends Resource
{
    protected static ?string $model = Goal::class;
    protected static ?string $navigationGroup = FilamentCategoryMenu::MAIN_PANEL->value;
    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static ?string $navigationLabel = 'Metas';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGoals::route('/'),
            'create' => Pages\CreateGoals::route('/create'),
            'edit' => Pages\EditGoals::route('/{record}/edit'),
        ];
    }
    public static function getPluralLabel(): ?string
    {
        return 'Metas';
    }
}
