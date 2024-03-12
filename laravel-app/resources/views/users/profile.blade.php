@include('templates.header')
@include('templates.menu')

@php
  use App\Http\Controllers\UserController;
@endphp

<div class="container">
  <h1>โปรไฟล์ (Profile)</h1>
  <p>
    <div class="card" style="width: 100%;">
      <p class="text-center">
        <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <img class="card-img-top" src="{{ asset($user->profile) }}" alt="{{ $user->fullname }}" style="width: 100px;">
        </a>
      </p>
      <div class="card-body">
        <h5 class="card-title">ชื่อ: {{ $user->fullname }} (รหัสผู้ใช้: {{ $user->id }})</h5>
        <p class="card-text">
          อีเมล: {{ $user->email }}<br />
          ประเภทผู้ใช้: {{ UserController::getUserRole($user->role) }}<br />
          สถานะการใช้งาน: {!! UserController::getUserActive($user->active) !!}
        </p>
        <p class="text-center">
          <a href="/user_edit" class="btn btn-warning">แก้ไขโปรไฟล์</a>
          <a href="/change_passwd/{{ $user->id }}" class="btn btn-warning">เปลี่ยนรหัสผ่าน</a>
        </p>
        <p>
          <a href="/users" class="btn btn-primary">ย้อนกลับ</a>
        </p>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <form action="/update_photo" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">เปลี่ยนรูปโปรไฟล์ (Change your profile photo)</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="m-3">
                <label for="formFile" class="form-label">เลือกรูปโปรไฟล์</label>
                <input class="form-control" type="file" id="formFile" name="userAvatar">
                <input type="hidden" name="userId" value="1001">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="submit" class="btn btn-primary">อัปโหลด</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </p>
</div>

@include('templates.footer')