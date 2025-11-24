@extends('layouts.admin')

@section('title', 'Daftar Layanan Laundry')
@section('header_title', 'Manajemen Layanan')

@section('content')

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 flex items-center gap-2" role="alert">
            <i data-lucide="check-circle" class="w-5 h-5"></i>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-5 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4 bg-gray-50 rounded-t-xl">
            <h3 class="font-bold text-gray-700 flex items-center gap-2">
                <i data-lucide="tag" class="w-5 h-5 text-gray-500"></i> Daftar Paket Laundry
            </h3>

            <a href="{{ route('services.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex items-center gap-2 transition shadow-sm">
                <i data-lucide="plus" class="w-4 h-4"></i> Tambah Layanan
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-100 text-gray-500 text-xs uppercase font-semibold">
                    <tr>
                        <th class="px-6 py-3 border-b">No</th>
                        <th class="px-6 py-3 border-b">Kategori Layanan</th>
                        <th class="px-6 py-3 border-b">Aroma Parfum</th>
                        <th class="px-6 py-3 border-b">Harga / Kg</th>
                        <th class="px-6 py-3 border-b">Dibuat Oleh</th>
                        <th class="px-6 py-3 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-600 bg-white">
                    @forelse($services as $index => $service)
                    <tr class="hover:bg-blue-50 transition duration-150">
                        <td class="px-6 py-4 text-gray-400">
                            {{ $services->firstItem() + $index }}
                        </td>

                        <td class="px-6 py-4 font-bold text-gray-700">
                            {{ $service->category }}
                        </td>

                        <td class="px-6 py-4">
                            @if($service->parfume_name)
                                <span class="px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs font-semibold flex items-center gap-1 w-fit">
                                    <i data-lucide="flower-2" class="w-3 h-3"></i>
                                    {{ $service->parfume_name }}
                                </span>
                            @else
                                <span class="text-gray-400 italic">- Tidak ada -</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 font-medium text-green-600 text-base">
                            Rp {{ number_format($service->price_per_kg, 0, ',', '.') }}
                        </td>

                        <td class="px-6 py-4 text-xs text-gray-500">
                            {{ $service->user->name ?? 'Admin Default' }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('services.edit', $service->id_service) }}" class="p-2 bg-yellow-50 rounded hover:bg-yellow-100 text-yellow-600 transition border border-yellow-200" title="Edit Layanan">
                                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                                </a>

                                <form action="{{ route('services.destroy', $service->id_service) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan {{ $service->category }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-red-50 rounded hover:bg-red-100 text-red-600 transition border border-red-200" title="Hapus Layanan">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-400">
                            <div class="flex flex-col items-center justify-center">
                                <i data-lucide="package-open" class="w-12 h-12 mb-3 text-gray-300"></i>
                                <p class="text-base font-medium">Belum ada layanan laundry.</p>
                                <p class="text-sm">Silakan klik tombol tambah di atas.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-100">
            {{ $services->links() }}
        </div>
    </div>
@endsection
