@include('templates.header')
@include('templates.menu')

@php
	use App\Http\Controllers\UserController;
@endphp

<div class="container">
	@isset($msg)
	<div class="alert alert-success" role="alert">{{ $msg }}</div>
	@endisset
  	<h1>ข้อมูลผู้ใช้ (Users list)</h1>
  	<table class="table table-borderless">
  	<tr>
  		<td><span class="d-flex justify-content-start">ข้อมูลจำนวน {{ $users_row }} รายการ</span></td>
  		<td><span class="d-flex justify-content-end"><a href="/user_create_form" class="btn btn-success"><li class="fa fa-user-plus"></li> เพิ่มผู้ใช้</a></span></td>
  	</tr>
  	</table>
  	<p>
	<table class="table table-sm">
		<tr>
			<th class="text-center">รหัสผู้ใช้</th>
			<th class="text-center">ชื่อ</th>
			<th class="text-center">อีเมล</th>
			<th class="text-center">บทบาทผู้ใช้</th>
			<th class="text-center">สถานะการใช้งาน</th>
			<th class="text-center">ดำเนินการ</th>
		</tr>
		<tbody>
		@forelse ($users as $user)
		<tr>
			<td class="text-center">{{ $user->id }}</td>
			<td>{{ $user->fullname }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ UserController::getUserRole($user->role) }}</td>
			<td class="text-center">{!! UserController::getUserActive($user->active) !!}</td>
			<td class="text-center">
				<a href="/users/{{ $user->id }}" type="button" class="btn btn-info">รายละเอียด</a>
				<button type="button" class="btn btn-warning">แก้ไข</button>
				<button type="button" class="btn btn-danger">ลบ</button>
			</td>
		</tr>
		@empty
		<tr>
			<td colspan="6" class="text-center">ไม่มีข้อมูลผู้ใช้</p>
		</tr>
		@endforelse
		</tbody>
		</table>
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
				{!! $users->links() !!}
			</ul>
		</nav>
	</p>
</div>

@include('templates.footer')