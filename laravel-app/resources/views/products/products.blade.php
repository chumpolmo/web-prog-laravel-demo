@include('templates.header')
@include('templates.menu')

@php
	use App\Http\Controllers\ProductController;
@endphp

<div class="container">
	<h1>รายละเอียดสินค้า</h1>
	<hr />
	@isset($prod)
	<div class="card mb-3" style="max-width: 100%;">
	  <div class="row g-0">
	    <div class="col-md-3">
	      <img src="{{ asset('storage/images/products/default.png') }}" class="img-fluid rounded-start p-2" title="{{ $prod->prod_name }}" style="width: 100%;">
	    </div>
	    <div class="col-md-9">
	      <div class="card-body">
	        <h5 class="card-title">ชื่อสินค้า: {{ $prod->prod_name }} (รหัสสินค้า: {{ $prod->prod_id}})</h5>
	        <p class="card-text">รายละเอียด: {{ $prod->prod_desc }}</p>
	        <p class="card-text">ราคาสินค้า: {{ $prod->prod_price }}</p>
	        <p class="card-text">สินค้าคงคลัง: {{ $prod->prod_balance }}</p>
	        <p class="card-text">หมวดหมู่: {{ $prod->cate_name }}</p>
	        <p class="card-text">สถานะ: {!! ProductController::getProductStatus($prod->prod_status) !!}</p>
	        <p class="card-text">ผู้ผลิต: {{ $prod->supp_name }}</p>
	      </div>
	    </div>
	  </div>
	</div>
	@endisset

	<div class="form-text mt-3">
		<a href="/products" class="btn btn-primary">ข้อมูลสินค้า</a>
	</div>
</div>

@include('templates.footer')