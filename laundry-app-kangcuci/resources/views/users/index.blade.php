@extends('layouts.admin')

@section('title', 'Manajemen Users')
@section('header_title', 'Data Pengguna')

@section('content')
<div class="bg-white rounded-xl shadow-sm border border-gray-200">
    <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50 rounded-t-xl">
        <h3 class="font-bold text-gray-700">Daftar Pengguna</h3>
        <a href="{{ route('users.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg flex items-center gap-2 text-sm font-medium">
            <i data-lucide="user-plus" class="w-4 h-4"></i> Tambah User
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100 text-gray-500 text-xs uppercase font-semibold">
                <tr>
                    <th class="px-6 py-3">Nama</th>
                    <th class="px-6 py-3">Role</th>
                    <th class="px-6 py-3">Email / Kontak</th>
                    <th class="px-6 py-3">Alamat</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                @foreach($users as $user)
                <tr class="hover:bg-blue-50">
                    <td class="px-6 py-4 font-semibold text-gray-700">{{ $user->name }}</td>
                    <td class="px-6 py-4">
                        @if($user->role == 'admin')
                            <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-bold">ADMIN</span>
                        @elseif($user->role == 'staff')
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-bold">STAFF</span>
                        @else
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-bold">CUSTOMER</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col">
                            <span>{{ $user->email }}</span>
                            <span class="text-xs text-gray-400">{{ $user->phone ?? '-' }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 truncate max-w-xs">{{ $user->address ?? '-' }}</td>
                    <td class="px-6 py-4 text-center">
                        <form action="{{ route('users.destroy', $user->id_user) }}" method="POST" onsubmit="return confirm('Hapus user ini?');">
                            @csrf @method('DELETE')
                            <button class="text-red-500 hover:bg-red-50 p-2 rounded"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
