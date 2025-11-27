<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Balasan Komplain</title>
</head>
<body>
    <h3>Halo, {{ $complaint->user->name }}</h3>
    <p>Admin telah membalas komplain Anda.</p>

    <p><strong>Judul Komplain:</strong> {{ $complaint->subject }}</p>
    <p><strong>Isi Komplain:</strong> {{ $complaint->message }}</p>
    
    <p><strong>Balasan Admin:</strong> <br> {{ $complaint->admin_response }}</p>

    <p><strong>Status saat ini:</strong> {{ ucfirst($complaint->status) }}</p>

    <p>Anda dapat melihat detail komplain di link berikut:</p>
    <p>
        <a href="{{ url('/complaints/'.$complaint->id) }}">Lihat Komplain</a>
    </p>

    <br>
    <p>Terima kasih,</p>
    <p>{{ config('app.name') }}</p>
</body>
</html>
