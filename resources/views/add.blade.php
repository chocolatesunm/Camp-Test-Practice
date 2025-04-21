@extends('layout')
<!--layout section -->
@section('contents')
<!--section contents -->
<form class="needs-validation" method="post" action="{{ url('/insert') }}" novalidate>
  @csrf
  <div class="form-group ">
    <div class="row">
      <!-- Prefix -->
      <div class="col md-3">
        <label for="prefix" class="mb-3">Prefix</label>
        <select class="form-select" name="prefix" id="prefix" required>
          <option value="" selected disabled>เลือก</option>
          @foreach($prefixes as $prefix)
          <option value="{{ $prefix->id }}">{{ $prefix->name ?? 'No name found'}}</option>
          <!--ต้องเรียก prefixes ที่ส่งมาจาก Campcontroller  -->
          @endforeach
        </select>
        <div class="invalid-feedback">
          กรุณาเลือกข้อมูล prefix
        </div>
      </div>
      <div class="col md-4">
        <label for="firstname" class="mb-3">Firstname</label>
        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" required>
        <div class="invalid-feedback">
          กรุณาระบุข้อมูล
        </div>
      </div>
      <div class="col md-5">
        <label for="lastname" class="mb-3">Lastname</label>
        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="lastname" required>
        <div class="invalid-feedback">
          กรุณาระบุข้อมูล
        </div>
      </div>
    </div>
  </div>
  <!-- section birthday and gender-->
  <div class="row">
    <div class="col-md-6 mt-3">
      <label for="birthday" class="mb-6">birthday</label>

      <input type="Date" class="form-control" name="birthday" id="birthday" placeholder="birthday" required>

      <div class="invalid-feedback">
        กรุณาระบุข้อมูล
      </div>
    </div>
    <div class="col-md-6 mt-3">
      <label for="gender" class="nt-3">Gender</label>
      <!--input same name cux use same type-->
      <div class="form-check">
        <input type="radio" class="form-check-input" id="man" name="gender" value="man" checked>Man
        <label class="form-check-label" for="man"></label>
      </div>
      <div class="form-check">
        <input type="radio" class="form-check-input" id="woman" name="gender" value="woman">Woman
        <label class="form-check-label" for="woman"></label>
      </div>
    </div>
  </div>
  <!-- section bio-->
  <label for="bio" class="mt-3">Bio</label>
  <textarea class="form-control" name="bio" id="bio" rows="3" placeholder="Bio" required></textarea>
  <div class="invalid-feedback">
    กรุณาระบุข้อมูล
  </div>
  </div>
  <div class="text-center">
    <input type="submit" class="justify-center btn btn-primary mt-3" style="width: 15%;" value="Submit">
  </div>
</form>
@endsection



@section('javascripts')
<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
  'use strict'
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')
  //เลือกฟอร์มทั้งหมดที่มี class ชื่อว่า needs-validation (ที่เราตั้งใน <form>)
  Array.from(forms).forEach(form => {
    //--Checked realtime input----  
    //------Firstname checked---------
    const firstname = form.querySelector('#firstname');
    firstname.addEventListener('input', () => {
      const val = firstname.value.trim();
      firstname.classList.remove('is-valid', 'is-invalid');
      if (val.length < 2) {
        firstname.classList.add('is-invalid');
      } else {
        firstname.classList.add('is-valid');
      }
    });
    //------Lastname checked---------
    const lastname = form.querySelector('#lastname');
    lastname.addEventListener('input', () => {
      const val = lastname.value.trim();
      lastname.classList.remove('is-valid', 'is-invalid');

      if (val.length < 2) {
        lastname.classList.add('is-invalid');
      } else {
        lastname.classList.add('is-valid');
      }
    });
    //------Prefix checked---------
    const prefix = form.querySelector('#prefix');
    prefix.addEventListener('input', () => {
      const val = prefix.value;
      prefix.classList.remove('is-valid', 'is-invalid');
      if (!val) {
        prefix.classList.add('is-invalid');
      } else {
        prefix.classList.add('is-valid');
      }
    });
    //------Bio checked---------
    const bio = form.querySelector('#bio');
    bio.addEventListener('input', () => {
      const val = bio.value.trim();
      bio.classList.remove('is-valid', 'is-invalid');
      if (val.length < 2) {
        bio.classList.add('is-invalid');
      } else {
        bio.classList.add('is-valid');
      }
    });
    // //------Birthday checked---------
    const birthday = form.querySelector('#birthday');
    birthday.addEventListener('input', () => {
      const val = birthday.value;
      birthday.classList.remove('is-valid', 'is-invalid');
      if (!val) {
        birthday.classList.add('is-invalid');
      } else {
        birthday.classList.add('is-valid');
      }
    });
 
  // ----------------- FORM SUBMIT -----------------
  form.addEventListener('submit', event => {
    const bio = form.querySelector('#bio');
    const birthday = form.querySelector('#birthday');
    const prefix = form.querySelector('#prefix');
    const fnamevalue = firstname.value.trim();
    const lnamevalue = lastname.value.trim();
    let valid = true;
    if (fnamevalue.length < 2) {
      valid = false;
      firstname.classList.add('is-invalid')
    }
    if (lnamevalue.length < 2) {
      valid = false;
      lastname.classList.add('is-invalid');
    }
    if (bio.value.trim() < 2) {
      valid = false;
      bio.classList.add('is-invalid');
    } else {
      bio.classList.remove('is-invalid');
      bio.classList.add('is-valid');
    }
    if (!birthday.value) {
      valid = false;
      birthday.classList.add('is-invalid');
    } else {
      birthday.classList.remove('is-invalid');
      birthday.classList.add('is-valid');
    }
    if (!prefix.value) {
      valid = false;
      prefix.classList.add('is-invalid');
    } else {
      prefix.classList.remove('is-invalid');
      prefix.classList.add('is-valid');
    }
    if (!valid || !form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }
  }, false);
  });
  })();
</script>

@endsection

@section('styles')
<link href="{{ url('public/assets/css/app.css') }}" rel="stylesheet">
@endsection