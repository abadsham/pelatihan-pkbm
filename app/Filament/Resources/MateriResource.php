<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MateriResource\Pages;
use App\Filament\Resources\MateriResource\RelationManagers;
use App\Models\Materi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MateriResource extends Resource
{
    protected static ?string $model = Materi::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Materi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tanggal')
                    ->required()
                    ->label('Tanggal Materi')
                    ->displayFormat('d-m-Y')
                    ->native(false),
                Forms\Components\Select::make('instruktur_id')
                    ->relationship('instruktur', 'nama')
                    ->required()
                    ->label('Instruktur'),
                Forms\Components\TextInput::make('materi_pembelajaran')
                    ->required()
                    ->maxLength(500)
                    ->label('Materi Pembelajaran'),
                Forms\Components\TextInput::make('jumlah_jam')
                    ->numeric()
                    ->required()
                    ->label('Jumlah Jam'),
                Forms\Components\FileUpload::make('gambar_bukti')
                    ->image()
                    ->required()
                    ->preserveFilenames()
                    ->label('Gambar Bukti')
                    ->disk('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal')
                    ->date('d-m-Y')
                    ->sortable()
                    ->label('Tanggal'),
                Tables\Columns\TextColumn::make('instruktur.nama')
                    ->searchable()
                    ->sortable()
                    ->label('Instruktur'),
                Tables\Columns\TextColumn::make('materi_pembelajaran')
                    ->limit(50)
                    ->searchable()
                    ->sortable()
                    ->label('Materi Pembelajaran'),
                Tables\Columns\TextColumn::make('jumlah_jam')
                    ->sortable()
                    ->label('Jumlah Jam'),
                Tables\Columns\ImageColumn::make('gambar_bukti')
                    ->label('Gambar Bukti')
                    ->disk('public')
                    ->square()
                    ->width(70)
                    ->extraImgAttributes(['class' => 'rounded-md']),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('dibuat pada')
                    ->dateTime('l, d-m-Y H:i')
                    ->sortable()
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
            'index' => Pages\ListMateris::route('/'),
            'create' => Pages\CreateMateri::route('/create'),
            'edit' => Pages\EditMateri::route('/{record}/edit'),
        ];
    }
}
