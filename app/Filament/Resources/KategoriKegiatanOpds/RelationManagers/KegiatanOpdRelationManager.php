<?php

namespace App\Filament\Resources\KategoriKegiatanOpds\RelationManagers;

use App\Filament\Resources\KategoriKegiatanOpds\KategoriKegiatanOpdResource;
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

class KegiatanOpdRelationManager extends RelationManager
{
    protected static string $relationship = 'KegiatanOpd';

    protected static ?string $relatedResource = KategoriKegiatanOpdResource::class;
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_user'] = auth()->id();

        return $data;
    }

    public function form(Schema $schema): Schema
    {
        return $schema
        ->components([
                // Select::make('id_kategori_kegiatan_opd')
                //     ->relationship('kategori', 'name')
                //     ->createOptionForm([
                //         TextInput::make('name')
                //             ->label('Nama Kategori Kegiatan OPD')
                //             ->required(),
                //     ])
                //     ->searchable()
                //     ->preload()
                //     ->required(),
                TextInput::make('title')
                    ->label('Judul Kegiatan OPD')
                    ->required(),
                FileUpload::make('image')
                    ->label('Thumbnail Artikel')
                    ->disk('public')
                    ->directory('kegiatan')
                    ->image()
                    ->required(),
                RichEditor::make('content')
                    ->label('Kegiatan OPD')
                    ->required()
                    ->columnSpanFull(),
              Section::make('Dokumentasi / Foto')
                ->description('Tambahkan foto dokumentasi kegiatan (maksimal 10 foto)')
                ->schema([
                    Repeater::make('dokumentasi')
                        ->relationship('dokumentasi') // nama relasi di model
                        ->schema([
                            FileUpload::make('file_path')
                                ->image()
                                ->disk('public')
                                ->directory('dokumentasi-kegiatan')
                                ->imagePreviewHeight('150')
                                ->required(),

                        ])
                        // ->columns(1)
                        ->addActionLabel('+ Tambah Foto')
                        ->minItems(1)
                        ->maxItems(10)
                        ->reorderable('urutan') // drag & drop urutan
                        // ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['keterangan'] ?? 'Foto'),
                ]),
            ]);
     }
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kategori.name')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('title')
                    ->searchable(),
                // TextColumn::make('dokumentasi.file_path')
                //     ->searchable(),
                ImageColumn::make('dokumentasi.file_path')
                    // ->disk('private')
                    ->imageHeight(40)
                    ->circular()
                    ->stacked()
                    ->ring(5),
                // ImageColumn::make('dokumentasi.path')
                //     ->disk('private')
                //     ->imageHeight(40)
                //     ->circular()
                //     ->stacked()
                //     ->ring(5),

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
                    ->label('Tambahkan Kegiatan')
                    ->color("info")
                    ->mutateFormDataUsing(function (array $data): array {  // ✅
                        $data['id_user'] = auth()->id();
                        $data['id_kategori_kegiatan_opd'] = $this->getOwnerRecord()->id;
                        return $data;
                }),
            ]);
    }
}
