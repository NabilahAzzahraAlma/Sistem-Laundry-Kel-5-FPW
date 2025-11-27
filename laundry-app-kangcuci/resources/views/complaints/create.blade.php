@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Komplain</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('complaints.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Judul Komplain</label>
            <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pesan / Deskripsi</label>
            <textarea name="message" class="form-control" rows="4" required>{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Komplain</button>
        <a href="{{ route('complaints.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
