@extends('layout')

@section('contents')
<h4>ตารางแสดงข้อมูลผู้ใช้ (table: camp_user_register)</h4>
<table class="table">
    <thead>
        <tr>
            <td width="5%">#</td>
            <td>user_prefix_id</td>
            <td>user_fname</td>
            <td>user_lname</td>
            <td>user_birth_date</td>
            <td>user_gender</td>
            <td>user_bio</td>
            <td>Tools</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach ($users as $index => $user)
            <td>{{ $index + 1 }}.</td>
            <td>{{ $user->prefix->name ?? '-' }}</td>
            <td>{{ $user->user_fname }}</td>
            <td>{{ $user->user_lname }}</td>
            <td>{{ \Carbon\Carbon::parse ($user->user_birth_date)->format('d/m/Y') }}</td>
            <td>{{ $user->user_gender }}</td>
            <td>{{ $user->user_bio }}</td>
            <td>
                <a href="{{ url('/edit'.$user->id) }}" class="btn btn-warning">Edit</a>
                <button onclick="confirmDelete({{ $user->id }})" class="btn btn-danger btn-sm">Delete</button>
                <form id="delete-form-{{ $user->id }}" action="{{ url('/delete'.$user->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection

@section('javascripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: "แน่ใจหรือไม่?",
            text: "คุณต้องการลบผู้ใช้นี้จริงหรือ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "ลบเลย",
            cancelButtonText: "ยกเลิก"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
</script>

<!-- แจ้งเตือนหลังลบ -->
@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('success')}}',
        showConfirmButton: false,
        timer: 2000
    });
</script>
@endif
@endsection

@section('styles')
@endsection