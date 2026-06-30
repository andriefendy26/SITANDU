<?php

namespace App\Filament\Resources\KategoriKegiatanPosyandus\RelationManagers;

use App\Filament\Resources\KategoriKegiatanPosyandus\KategoriKegiatanPosyanduResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;

use Filament\Schemas\Schema;


class KegiatanPosyanduRelationManager extends RelationManager
{
    protected static string $relationship = 'KegiatanPosyandu';

    protected static ?string $relatedResource = KategoriKegiatanPosyanduResource::class;
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_user'] = auth()->id();
        $data['id_kategori_kegiatan_posyandu'] = $this->getOwnerRecord()->id; // ✅ ambil dari parent

        return $data;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                // ✅ Select kategori dihapus, sudah otomatis dari parent
                TextInput::make('title')
                    ->label('Judul Kegiatan Posyandu')
                    ->required(),
                FileUpload::make('image')
                    ->label('Thumbnail Artikel')
                    ->disk('public')
                    ->directory('kegiatan')
                    ->image()
                    ->required(),
                RichEditor::make('content')
                    ->label('Kegiatan Posyandu')
                    ->required()
                    ->columnSpanFull(),
                
                Section::make('Dokumentasi / Foto')
                    ->description('Tambahkan foto dokumentasi kegiatan (maksimal 10 foto)')
                    ->schema([
                        Repeater::make('dokumentasi')
                            ->relationship('dokumentasi')
                            ->schema([
                                FileUpload::make('file_path')
                                    ->image()
                                    ->disk('public')
                                    ->directory('dokumentasi-kegiatan')
                                    ->imagePreviewHeight('150')
                                    ->required(),
                            ])
                            ->addActionLabel('+ Tambah Foto')
                            ->minItems(1)
                            ->maxItems(10)
                            ->reorderable('urutan')
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['keterangan'] ?? 'Foto'),
                    ]),
            ]);
    }


    public function table(Table $table): Table
    {
        return $table
             ->columns([
                TextColumn::make('user.name')
                    ->label('Pengguna')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kategori.name')
                    ->label('Kategori')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable(),
                // TextColumn::make('image')
                //     ->label('Thumbnail')
                //     ->searchable(),
                ImageColumn::make('image')
                    ->label('Thumbnail')
                    ->disk('public')
                    // ->directory('kegiatan')
                    // ->rounded()
                    ->height(50)
                    ->width(50)
                    ->visibility("public"),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label("Tambahkan Kegiatan")
                    ->color("info")
                    ->mutateFormDataUsing(function (array $data): array {  // ✅
                        $data['id_user'] = auth()->id();
                        $data['id_kategori_kegiatan_posyandu'] = $this->getOwnerRecord()->id;
                        return $data;
                }),
            ]);
    }
}
