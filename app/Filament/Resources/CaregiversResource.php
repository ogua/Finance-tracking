<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CaregiversResource\Pages;
use App\Filament\Resources\CaregiversResource\RelationManagers;
use App\Filament\Resources\CaregiversResource\Widgets\CaregiversOverview;
use App\Models\Caregivers;
use App\Models\Orphans;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CaregiversResource extends Resource
{
    protected static ?string $model = Caregivers::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationLabel = 'Caregivers';
    protected static ?string $modelLabel = 'Caregiver';
    protected static ?int $navigationSort = 3;
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('')
            ->description('')
            ->schema([                
                Forms\Components\TextInput::make('firstname')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('lastname')
                ->required()
                ->maxLength(255),
                Forms\Components\Select::make('gender')
                ->required()
                ->options([
                    'Male' => 'Male',
                    'Female' => 'Female',
                ]),
                Forms\Components\TextInput::make('position')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('contact_number')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),
                Forms\Components\Textarea::make('address')
                ->required()
                ->columnSpanFull(),
                
                Forms\Components\Select::make('orphans')
                ->relationship()
                ->helperText("Assign Caregiver to an orphan or multiple orphans")
                ->label('Assign Caregiver to Orphan(s)')
                ->options(Orphans::all()->pluck('full_name', 'id'))
                ->searchable()
                ->multiple()
                ->preload(),
                ])
                ->columns(2),
            ]);
        }
        
        public static function table(Table $table): Table
        {
            return $table
            ->columns([
                Tables\Columns\TextColumn::make('firstname')
                ->searchable(),
                Tables\Columns\TextColumn::make('lastname')
                ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                ->searchable(),
                Tables\Columns\TextColumn::make('position')
                ->searchable(),
                Tables\Columns\TextColumn::make('contact_number')
                ->searchable(),
                Tables\Columns\TextColumn::make('email')
                ->searchable(),
                Tables\Columns\TextColumn::make('orphans.lastname')
                ->searchable()
                ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
                ])
                ->filters([
                    //
                    ])
                    ->actions([
                        Tables\Actions\ViewAction::make(),
                        Tables\Actions\EditAction::make(),
                        Tables\Actions\DeleteAction::make(),
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
                    
                    public static function getWidgets(): array
                    {
                        return [
                            CaregiversOverview::class,
                        ];
                    }
                    
                    public static function getPages(): array
                    {
                        return [
                            'index' => Pages\ListCaregivers::route('/'),
                            'create' => Pages\CreateCaregivers::route('/create'),
                            'view' => Pages\ViewCaregivers::route('/{record}'),
                            'edit' => Pages\EditCaregivers::route('/{record}/edit'),
                        ];
                    }
                }
                