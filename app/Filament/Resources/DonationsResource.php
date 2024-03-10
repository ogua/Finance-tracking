<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonationsResource\Pages;
use App\Filament\Resources\DonationsResource\RelationManagers;
use App\Models\Donations;
use App\Models\Sponsors;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DonationsResource extends Resource
{
    protected static ?string $model = Donations::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationLabel = 'Donations';
    protected static ?string $modelLabel = 'Donation';
    protected static ?int $navigationSort = 7;
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('')
            ->description('')
            ->schema([
                Forms\Components\Select::make('sponsor_id')
                ->label('Sponsor')
                ->required()
                ->options(Sponsors::all()->pluck('full_name','id')),
                Forms\Components\TextInput::make('amount')
                ->required()
                ->maxLength(255),
                Forms\Components\DatePicker::make('donation_date')
                ->required(),
                Forms\Components\Textarea::make('notes')
                ->columnSpanFull(),
                ])
                ->columns(2),
            ]);
        }
        
        public static function table(Table $table): Table
        {
            return $table
            ->columns([
                Tables\Columns\TextColumn::make('sponsor.full_name')
                ->label('Sponsor')
                ->numeric()
                ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                ->searchable()
                ->state(function (Donations $record): string {
                    return "Ghc".number_format($record->amount,2);
                }),
                Tables\Columns\TextColumn::make('donation_date')
                ->date()
                ->sortable(),
                Tables\Columns\TextColumn::make('notes'),
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
                            'index' => Pages\ListDonations::route('/'),
                            'create' => Pages\CreateDonations::route('/create'),
                            'view' => Pages\ViewDonations::route('/{record}'),
                            'edit' => Pages\EditDonations::route('/{record}/edit'),
                        ];
                    }
                }
                