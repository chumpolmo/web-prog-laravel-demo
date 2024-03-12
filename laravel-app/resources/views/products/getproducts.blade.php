@include('templates.header')
@include('templates.menu')

@php
	use App\Http\Controllers\ProductController;
@endphp

<div class="container">
	<h1>ข้อมูลสินค้า (Products list)</h1>
	<table class="table table-borderless">
		<tr>
			<td><span class="d-flex justify-content-start">สินค้าจำนวน {{ $prods_row }} รายการ</span></td>
			<td><span class="d-flex justify-content-end"><a href="/product_create_form" class="btn btn-success"><li class="fa fa-plus-circle"></li> เพิ่มสินค้า</a></span></td>
		</tr>
	</table>
  	<p>
	<table class="table table-sm">
		<tr>
			<th class="text-center">รหัสสินค้า</th>
			<th class="text-center">ชื่อสินค้า</th>
			<th class="text-center">ประเภท</th>
			<th class="text-center">จำนวน</th>
			<th class="text-center">สถานะ</th>
			<th class="text-center">ดำเนินการ</th>
		</tr>
		<tbody>
		@forelse ($prods as $prod)
		<tr>
			<td class="text-center">{{ $prod->prod_id }}</td>
			<td>{{ $prod->prod_name }}</td>
			<td>{{ $prod->cate_name }}</td>
			<td class="text-end">{{ $prod->prod_amount }}</td>
			<td class="text-center">{!! ProductController::getProductStatus($prod->prod_status) !!}</td>
			<td class="text-center">
				<a href="/products/{{ $prod->prod_id }}" type="button" class="btn btn-info">รายละเอียด</a>
				<a href="/product_update_form/{{ $prod->prod_id }}" type="button" class="btn btn-warning">แก้ไข</a>
				<a href="/product_delete/{{ $prod->prod_id }}" type="button" class="btn btn-danger" onclick="return confirm('กรุณายืนยันการลบข้อมูล รหัสสินค้า {{ $prod->prod_id }}?')">ลบ</button>
			</td>
		</tr>
		@empty
		<tr>
			<td colspan="6" class="text-center">ไม่มีข้อมูลสินค้า</p>
		</tr>
		@endforelse
		</tbody>
		</table>
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
				{!! $prods->links() !!}
			</ul>
		</nav>
	</p>
</div>

@include('templates.footer')