<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrphansResource\Pages;
use App\Filament\Resources\OrphansResource\RelationManagers;
use App\Filament\Resources\OrphansResource\Widgets\Orphanoverview;
use App\Models\Orphans;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrphansResource extends Resource
{
    protected static ?string $model = Orphans::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    //protected static ?string $slug = 'settings/clients';
    // protected static ?string $navigationGroup = 'Settings';
    protected static ?string $navigationLabel = 'Orphans';
    protected static ?string $modelLabel = 'Orphan';
    protected static ?int $navigationSort = 1;
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
        ->orderBy('id','desc');
    }
    
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Section::make('')
            ->description('')
            ->schema([
                Forms\Components\FileUpload::make('image')
                ->image()
                ->imageEditor()
                ->circleCropper()
                ->columnSpanFull()
                ->uploadingMessage('Uploading orphan image...'),
                Forms\Components\TextInput::make('firstname')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('lastname')
                ->required()
                ->maxLength(255),
                Forms\Components\DatePicker::make('date_of_birth')
                ->required(),
                Forms\Components\Select::make('gender')
                ->required()
                ->options([
                    'Male' => 'Male',
                    'Female' => 'Female',
                ]),
                Forms\Components\DatePicker::make('entry_date')
                ->required(),
                Forms\Components\DatePicker::make('exit_date'),
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
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('firstname')
                ->searchable(),
                Tables\Columns\TextColumn::make('lastname')
                ->searchable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                ->date()
                ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                ->searchable(),
                Tables\Columns\TextColumn::make('entry_date')
                ->date()
                ->sortable(),
                Tables\Columns\TextColumn::make('exit_date')
                ->date()
                ->sortable(),
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
                            Orphanoverview::class,
                        ];
                    }
                    
                    public static function getPages(): array
                    {
                        return [
                            'index' => Pages\ListOrphans::route('/'),
                            //'create' => Pages\CreateOrphans::route('/create'),
                            'view' => Pages\ViewOrphans::route('/{record}'),
                            //'edit' => Pages\EditOrphans::route('/{record}/edit'),
                        ];
                    }
                }
                