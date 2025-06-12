<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Helper\FormHelper;
use App\Models\Enums\AvailableLanguages;
use App\Models\User;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Ysfkaya\FilamentPhoneInput\Forms\PhoneInput;
use Ysfkaya\FilamentPhoneInput\Infolists\PhoneEntry;
use Ysfkaya\FilamentPhoneInput\PhoneInputNumberType;
use Ysfkaya\FilamentPhoneInput\Tables\PhoneColumn;


class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationLabel = 'Usuarios';
    protected static ?string $navigationGroup = 'Administracions';
    protected static ?string $navigationIcon = 'heroicon-o-users';

    /** I don't understand this function */
    public static function infolists(Infolist $infoList): Infolist
    {
        return $infoList
            ->columns([
                TextEntry::make('firstname'),
                Tables\Columns\TextColumn::make('email'),
                PhoneEntry::make('phone')
                    ->displayFormat(PhoneInputNumberType::NATIONAL),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('firstname')
                    ->required()
                    ->maxLength(255)
                    ->placeholder(FormHelper::TEXT_INPUT_PLACEHOLDER)
                    ->label('Nombre'),
                TextInput::make('lastname')
                    ->required()
                    ->maxLength(255)
                    ->placeholder(FormHelper::TEXT_INPUT_PLACEHOLDER)
                    ->label('Apellido'),
                TextInput::make('email')
                    ->required()
                    ->placeholder(FormHelper::TEXT_INPUT_PLACEHOLDER)
                    ->maxLength(255)
                    ->email()
                    ->label('Email'),
                PhoneInput::make('phone')->label('Telefono'),
                TextInput::make('password')
                    ->placeholder(FormHelper::TEXT_INPUT_PLACEHOLDER)
                    ->password()
                    ->disabledOn('edit')
                    ->maxLength(255),
                Select::make('locale')
                    ->required()
                    ->label('Idioma')
                    ->placeholder(FormHelper::SELECT_OPTION_PLACEHOLDER)
                    ->default(AvailableLanguages::ES->value)
                    ->options(array_combine(
                        array_map(fn($case) => $case->value, AvailableLanguages::cases()),
                        array_map(fn($case) => $case->getLabels(), AvailableLanguages::cases())
                    ))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('firstname')->label('Nombre'),
                Tables\Columns\TextColumn::make('lastname')->label('Apellido'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                PhoneColumn::make('phone')
                    ->label('Telefono')
                    ->displayFormat(PhoneInputNumberType::NATIONAL)
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return 'Usuarios';
    }
}
