@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Wrapper for centering the form -->
    <div class="form-container">
        <h1 class="page-title">Edit Komplain</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('complaints.update', $complaint) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul Komplain</label>
                <input type="text" name="subject" class="form-control" value="{{ old('subject', $complaint->subject) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Pesan / Deskripsi</label>
                <textarea name="message" class="form-control" rows="6" required>{{ old('message', $complaint->message) }}</textarea>
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('complaints.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

<!-- Custom Styling for the Form -->
<style>
    /* General Page Background */
    body {
        background-color: #f4f7f6; /* Light background */
        font-family: 'Arial', sans-serif;
    }

    /* Centered Form Container */
    .form-container {
        max-width: 900px; /* 3x the original size */
        width: 100%;
        margin: 100px auto; /* Center horizontally and add top margin */
        padding: 40px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Title Styling */
    .page-title {
        font-size: 36px; /* Larger Title */
        color: #388e3c; /* Dark Green */
        text-align: center;
        margin-bottom: 20px;
        font-weight: bold;
    }

    /* Form Label */
    .form-label {
        font-size: 18px; /* Larger label font */
        color: #333;
        margin-bottom: 8px;
    }

    /* Input & Textarea Styling */
    .form-control {
        width: 100%;
        padding: 18px;  /* Increased padding */
        font-size: 18px; /* Larger text */
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    /* Button Styling */
    .btn-primary {
        background-color: #66bb6a; /* Green */
        border-color: #66bb6a;
        color: white;
        padding: 15px 30px;
        font-size: 20px;
        border-radius: 5px;
    }

    .btn-primary:hover {
        background-color: #388e3c; /* Darker Green */
    }

    .btn-secondary {
        background-color: #f1f1f1; /* Light Gray */
        border-color: #ddd;
        color: #333;
        padding: 15px 30px;
        font-size: 20px;
        border-radius: 5px;
    }

    .btn-secondary:hover {
        background-color: #e0e0e0; /* Darker Gray */
    }

    /* Error Message Styling */
    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .alert-danger ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .alert-danger li {
        font-size: 16px;
    }

    /* Button Container */
    .form-buttons {
        text-align: center;
        margin-top: 30px;
    }

</style>
@endsection
