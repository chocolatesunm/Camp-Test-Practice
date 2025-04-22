@extends('layout')
@section('contents')
<h4>

    Edit Information
    <form action="{{ url('/update'. $user->id) }}" method="post">

        @method('PUT')
        <div class="container mt-4">
            <div class="bg-light p-5 rounded mx-auto" style="max-width: 1000px;">
                <h1>กรอบใหญ่นุ่มๆ</h1>
                <p>เหมาะสำหรับ intro หรือส่วนหลักของหน้า</p>
            </div>
        </div>

        <!-- <label>userfname</label>
                <input type="text" name="userfname" value="{{ $user->user_fname }}" required>
            </div>

        </div>

        <div>
            <label>userlname</label>
            <input type="text" name="userlname" value="{{ $user->user_lname }}" required>
        </div>

        <div>
            <label> user_gender</label>
            <input type="text" name="user_gender" value="{{ $user->user_gender }}" required>
        </div>

        <div>
            <label>user_birthday</label>
            <input type="text" name="user_birth_date" value="{{ $user->user_birth_date }}" required>
        </div>

        <div>
            <label>user_bio</label>
            <input type="text" name="user_bio" value=" {{ $user->user_bio }}" required>
        </div>
        <div>
            <button type="submit" name="action" class="btn btn-primary"> save</button>
        </div>
    </form>
</h4> -->

        @endsection
        @section('javascripts')

        @endsection
        @section('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        @endsection