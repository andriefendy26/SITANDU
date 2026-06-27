{{-- resources/views/filament/pages/view-user-dokumen.blade.php --}}

<x-filament-panels::page>

    {{-- Profile Card --}}
    <x-filament::section>
        <div class="flex items-center gap-4">
            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-primary-100 text-xl font-semibold text-primary-600">
                {{ strtoupper(substr($user->name, 0, 2)) }}
            </div>
            <div class="flex-1">
                <p class="text-lg font-semibold text-gray-900 dark:text-white">{{ $user->name }}</p>
                <p class="text-sm text-gray-500">{{ $user->email }} · {{ $user->units?->name ?? '-' }}</p>
                <x-filament::badge color="success" class="mt-1">
                    {{ $user->getRoleNames()->first() ?? 'user' }}
                </x-filament::badge>
            </div>
            <div class="text-right text-sm text-gray-500">
                <p class="text-xs">Bergabung sejak</p>
                <p>{{ $user->created_at->translatedFormat('d M Y') }}</p>
            </div>
        </div>
    </x-filament::section>

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        <x-filament::section>
            <p class="text-sm text-gray-500">Total dokumen</p>
            <p class="mt-1 text-3xl font-semibold">{{ $stats['total'] }}</p>
            <p class="text-xs text-gray-400">semua jenis</p>
        </x-filament::section>

        <x-filament::section>
            <p class="text-sm text-gray-500">Upload bulan ini</p>
            <p class="mt-1 text-3xl font-semibold">{{ $stats['bulan_ini'] }}</p>
            <p class="text-xs text-gray-400">{{ now()->translatedFormat('F Y') }}</p>
        </x-filament::section>

        <x-filament::section>
            <p class="text-sm text-gray-500">Jenis dokumen</p>
            <p class="mt-1 text-3xl font-semibold">{{ $stats['jenis_dipakai'] }}</p>
            <p class="text-xs text-gray-400">dari {{ count($perJenis) }} jenis tersedia</p>
        </x-filament::section>
    </div>

    {{-- Per Jenis Dokumen --}}
    <x-filament::section heading="Dokumen per jenis">
        <div class="grid grid-cols-2 gap-3 sm:grid-cols-3">
            @foreach($perJenis as $jenis)
                <div class="flex items-center justify-between rounded-lg border border-gray-200 dark:border-gray-700 px-4 py-3">
                    <span class="text-sm text-gray-700 dark:text-gray-300">{{ $jenis['title'] }}</span>
                    <x-filament::badge color="{{ $jenis['dokumen_count'] > 0 ? 'primary' : 'gray' }}">
                        {{ $jenis['dokumen_count'] }}
                    </x-filament::badge>
                </div>
            @endforeach
        </div>
    </x-filament::section>

    {{-- Tabel Dokumen --}}
    <x-filament::section heading="Semua file yang diupload">
        {{ $this->table }}
    </x-filament::section>

</x-filament-panels::page>