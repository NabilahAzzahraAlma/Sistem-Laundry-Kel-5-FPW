@foreach ($complaints as $complaint)
    <h3>Komplain Dari: {{ $complaint->user_id }}</h3>
<p><b>Subject:</b> {{ $complaint->subject }}</p>
<p><b>Isi Pesan:</b> {{ $complaint->message }}</p>
<p><b>Status: </b>{{$complaint->status}}</p>

@endforeach
@if($complaint->attachment)
    <p><b>Lampiran:</b> <a href="{{ asset('storage/'.$complaint->attachment) }}" target="_blank">Download</a></p>
@endif

<form action="{{ route('admin.complaints.respond', $complaint->id) }}" method="POST">
    @csrf
    <label>Respon Admin</label>
    <textarea name="admin_response" class="form-control">{{ $complaint->admin_response }}</textarea>

    <label>Status</label>
    <select name="status" class="form-control">
        <option value="pending">Pending</option>
        <option value="in_progress">Diproses</option>
        <option value="resolved">Selesai</option>
    </select>

    <button type="submit" class="btn btn-success mt-3">Kirim</button>
</form>
