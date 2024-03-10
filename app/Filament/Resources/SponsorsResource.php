<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SponsorsResource\Pages;
use App\Filament\Resources\SponsorsResource\RelationManagers;
use App\Models\Orphans;
use App\Models\Sponsors;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SponsorsResource extends Resource
{
    protected static ?string $model = Sponsors::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationLabel = 'Sponsors';
    protected static ?string $modelLabel = 'Sponsor';
    protected static ?int $navigationSort = 4;
    
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
                ->helperText("Assign orphan(s) to a sponsor")
                ->label('Assign sponsor to Orphan(s)')
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
                    
                    public static function getPages(): array
                    {
                        return [
                            'index' => Pages\ListSponsors::route('/'),
                            'create' => Pages\CreateSponsors::route('/create'),
                            'view' => Pages\ViewSponsors::route('/{record}'),
                            'edit' => Pages\EditSponsors::route('/{record}/edit'),
                        ];
                    }
                }
                