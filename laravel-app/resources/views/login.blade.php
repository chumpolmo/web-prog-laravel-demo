@include('templates.header')
@include('templates.menu')

<div class="container w-50">
  <h1>เข้าสู่ระบบ</h1>
  <p>
    <form action="/user_login" method="POST">
      @csrf
	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">อีเมล (E-mail)</label>
	    <input type="email" class="form-control @error('exampleInputEmail1') is-invalid @enderror" name="inputEmail" id="exampleInputEmail1" value="{{ old('inputEmail') }}" aria-describedby="emailHelp">
		@error('inputEmail')
		    <div class="text-danger">{{ $message }}</div>
		@enderror
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputPassword1" class="form-label">รหัสผ่าน (Password)</label>
	    <input type="password"  class="form-control @error('exampleInputPassword1') is-invalid @enderror" name="inputPassword" value="{{ old('inputPassword') }}" id="exampleInputPassword1">
		@error('inputPassword')
		    <div class="text-danger">{{ $message }}</div>
		@enderror
	  </div>
	  <button type="submit" class="btn btn-primary">Login</button>
	  <div class="mt-3">
	    <label for="exampleRegister" class="form-label"><a href="#">สมัครสมาชิก (Register)</a></label> | 
	    <label for="exampleForgotPassword" class="form-label"><a href="#">ลืมรหัสผ่าน (Forgot password)?</a></label>
	  </div>
    </form>
  </p>
</div>

@include('templates.footer')