@extends('layouts.app')

@section('content')

 <x-layout>
        <p>Konten yang akan ditampilkan di dalam slot</p>
    </x-layout>
    
<div class="container">
    <h1>Daftar Semua Komplain User</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID User</th>
                <th>Nama User</th>
                <th>Judul Komplain</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Update Status</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($complaints as $complaint)
            <tr>
                <td>{{ $complaint->user_id }}</td>
                <td>{{ $complaint->user->name ?? '-' }}</td>
                <td>{{ $complaint->title }}</td>
                <td>{{ $complaint->message }}</td>
                <td><strong>{{ ucfirst($complaint->status) }}</strong></td>
                <td>
                    <form action="{{ route('admin.complaints.updateStatus', $complaint) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="proses" {{ $complaint->status == 'proses' ? 'selected' : '' }}>Proses</option>
                            <option value="selesai" {{ $complaint->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">Belum ada komplain.</td></tr>
        @endforelse
        </tbody>
    </table>
</div>
@endsection
