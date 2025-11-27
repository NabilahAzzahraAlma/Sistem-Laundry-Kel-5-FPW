@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Wrapper for aligning the button and title -->
    <div class="d-flex flex-column align-items-center mb-4">
        <h1 class="page-title text-center">Daftar Komplain</h1>
        <!-- "Tambah Komplain" button placed in the desired position -->
        @if (Auth::user()->role == 'client')
            <a href="{{ route('complaints.create') }}" class="btn btn-primary mb-3 btn-tambah">Tambah Komplain</a>
        @endif

        <!-- Title centered and enlarged -->

    </div>

    <!-- Table container with flex to center it horizontally -->
    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Pesan</th>
                    <th>Status</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($complaints as $complaint)
                <tr>
                    <td>{{ $complaint->subject }}</td>
                    <td>{{ $complaint->message }}</td>
                    <td>{{ ucfirst($complaint->status) }}</td>
                    <td>{{ $complaint->created_at ? $complaint->created_at->format('d-m-Y H:i') : 'Tanggal tidak tersedia' }}</td>
                    <td>
                        @if (Auth::user()->role == 'client') <!-- Client role actions -->
                            <a href="{{ route('complaints.edit', $complaint) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('complaints.destroy', $complaint) }}"
                                  method="POST"
                                  style="display:inline-block"
                                  onsubmit="return confirm('Yakin hapus komplain ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        @elseif (Auth::user()->role == 'admin') <!-- Admin role actions -->
                            {{-- <a href="{{ route('complaints.edit', $complaint) }}" class="btn btn-sm btn-warning">Edit</a> --}}

                            <form action="{{ route('complaints.destroy', $complaint) }}"
                                  method="POST"
                                  style="display:inline-block"
                                  onsubmit="return confirm('Yakin hapus komplain ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>

                            <!-- Update Status for Admin -->
                            <form action="{{ route('complaints.updateStatus', $complaint) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm">
                                    <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="proses" {{ $complaint->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                    <option value="selesai" {{ $complaint->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-success">Update Status</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="empty-message">Belum ada komplain.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Custom Styling for Table and UI -->
<style>
    /* Page Background */
    body {
        background-color: #e8f5e9; /* Light Green Background */
        font-family: Arial, sans-serif;
    }

    /* Title */
    .page-title {
        color: #388e3c; /* Dark Green */
        font-size: 36px; /* Larger Title */
        font-weight: bold; /* Bold Title */
        margin-bottom: 20px;
    }

    /* Centering the button and title */
    .d-flex {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .mb-4 {
        margin-bottom: 30px; /* Adds some space below the title and button */
    }

    .btn-tambah {
        position: relative;
        top: 10px; /* Adjust the top margin to position it exactly where you want it */
        margin-bottom: 15px; /* Space between the button and title */
    }

    /* Table Container - Center the Table */
    .table-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }

    /* Table Styling */
    table {
        width: 80%;
        max-width: 1200px; /* Prevent table from becoming too wide */
        border-collapse: collapse;
        background-color: #ffffff; /* White Background */
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    th {
        background-color: #66bb6a; /* Dark Green */
        color: white;
        padding: 12px;
        text-align: center;
        font-size: 16px;
    }

    td {
        text-align: center;
        padding: 12px;
        font-size: 14px;
        border-bottom: 1px solid #ddd;
    }

    /* Alternating Row Colors */
    tr:nth-child(odd) {
        background-color: #f1f8e9; /* Light Green */
    }

    tr:nth-child(even) {
        background-color: #ffffff; /* White */
    }

    /* Buttons */
    .btn-primary {
        background-color: #388e3c; /* Dark Green */
        border-color: #388e3c;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
    }

    .btn-primary:hover {
        background-color: #2c6e29; /* Darker Green */
    }

    .btn-warning {
        background-color: #ffeb3b; /* Yellow */
        color: black;
        padding: 8px 12px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
    }

    .btn-warning:hover {
        background-color: #fbc02d; /* Darker Yellow */
    }

    .btn-danger {
        background-color: #ef5350; /* Red */
        color: white;
        padding: 8px 12px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
    }

    .btn-danger:hover {
        background-color: #e53935; /* Darker Red */
    }

    .btn-success {
        background-color: #66bb6a; /* Green for success */
        color: white;
        padding: 8px 12px;
        border-radius: 4px;
    }

    .btn-success:hover {
        background-color: #388e3c; /* Darker Green */
    }

    /* Empty Message */
    .empty-message {
        text-align: center;
        padding: 15px;
        font-style: italic;
    }
</style>
@endsection
