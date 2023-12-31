<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Student;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\TextColumn;



class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                 TextInput::make('name')->required(),
                  TextInput::make('email')->required()
                            ->email(),
                  TextInput::make('phone')
                              ->tel()
                              ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
                 TextInput::make('manufacturer')
                            ->datalist([
                                     'BWM',
                                      'Ford',
                                    'Mercedes-Benz',
                                      'Porsche',
                                      'Toyota',
                                     'Tesla',
                                     'Volkswagen',
                                  ]),
                TextInput::make('technologies')
                     ->datalist([
                                'Laravel Livewire',
                                'laravel',
                                'Mysql',
                                'React',
                                'Angular',
                     ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('name')->limit(20)->sortable()->searchable(),
                TextColumn::make('email')->limit(50)->sortable()->searchable(),
                TextColumn::make('phone')->limit(20)->sortable()->searchable(),
                TextColumn::make('manufacturer')->limit(20)->sortable()->searchable(),
                TextColumn::make('technologies')->limit(20)->sortable()->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }    
}
