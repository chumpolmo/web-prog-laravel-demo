@include('templates.header')
@include('templates.menu')

<div class="container">
	<h1>เพิ่มข้อมูลผู้ใช้ (Add New User)</h1>
	<div class="p-3">
	<form action="/user_create" method="POST">
		@csrf
		<div class="mb-3"> 
			<label for="fn_id" class="form-label">ชื่อ-สกุล:</label><br />
			<input type="text" id="fn_id" name="usr_fullname" value="{{ old('usr_fullname') }}" class="form-control">
			@error('usr_fullname')
			    <span class="text-danger form-text">{{ $message }}</span>
			@enderror
		</div>
		<div class="mb-3"> 
			<label for="em_id" class="form-label">อีเมล:</label><br />
			<input type="email" id="em_id" name="usr_email" class="form-control">
			@error('usr_email')
			    <span class="text-danger form-text">{{ $message }}</span>
			@enderror
		</div>
		<div class="mb-3"> 
			<label for="pw_id" class="form-label">รหัสผ่าน:</label><br />
    		<div class="input-group" id="show_hide_password">
				<input type="password" id="pw_id" name="usr_passwd" class="form-control">
				<div class="input-group-addon p-1 border">
	        	<a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
	      		</div>
      		</div>
			@error('usr_passwd')
			    <span class="text-danger form-text">{{ $message }}</span>
			@enderror
		</div>
  		<div class="mb-3">
		<label class="form-label">บทบาท:</label>
			<div class="form-check">
  				<input type="radio" name="usr_role" id="ro_id1" value="10" class="form-check-input">
  				<label for="ro_id1" class="form-check-label">ผู้ดูแลระบบ / Administrator</label>
  			</div>
  			<div class="form-check">
  				<input type="radio" name="usr_role" id="ro_id2" value="20" class="form-check-input" checked>
  				<label for="ro_id2" class="form-check-label">ผู้ใช้ทั่วไป / User</label>
  			</div>
  		</div>
  		<div class="mb-3">
		<label class="form-label">สถานะการเปิดใช้งาน:</label>
			<div class="form-check">
  				<input type="radio" name="usr_active" id="ac_id1" value="1" class="form-check-input">
  				<label for="ac_id1" class="form-check-label">Active</label>
  			</div>
  			<div class="form-check">
  				<input type="radio" name="usr_active" id="ac_id2" value="0" class="form-check-input" checked>
  				<label for="ac_id2" class="form-check-label">In-active</label>
  			</div>
  		</div>
		<div class="mb-3 d-flex justify-content-center">
			<button type="submit" class="btn btn-primary m-1">เพิ่มข้อมูล</button>
			<button type="reset" class="btn btn-secondary m-1">เคลียร์</button>
		</div>
	</form>
	</div>
	<p class="d-flex justify-content-start">
          <a href="/users" class="btn btn-warning">ย้อนกลับ</a>
    </p>
</div>

@include('templates.footer')