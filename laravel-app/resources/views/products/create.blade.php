@include('templates.header')
@include('templates.menu')

<div class="container">
	<h1>เพิ่มข้อมูลสินค้า (Add New Product)</h1>
	<div class="p-3">
	<form action="/product_create" method="POST" onsubmit="return confirm('กรุณายืนยันการบันทึกข้อมูล?')">
		@csrf
		<div class="mb-3"> 
			<label for="pn_id" class="form-label">ชื่อสินค้า<span class="text-danger form-text">*</span>:</label><br />
			<input type="text" id="pn_id" name="prod_name" value="{{ old('prod_name') }}" class="form-control">
			@error('prod_name')
			    <span class="text-danger form-text">{{ $message }}</span>
			@enderror
		</div>
		<div class="mb-3">
			<label for="pd_id" class="form-label">รายละเอียดสินค้า:</label><br />
			<textarea cols="50" rows="4" id="pd_id" name="prod_desc" class="form-control"></textarea>
		</div>
		<div class="mb-3">
		<label class="form-label">หมวดหมู่<span class="text-danger form-text">*</span>:</label>
			<div class="form-check">
  				<input type="radio" name="prod_cate" id="pca_id1" value="10" class="form-check-input" @if(old('prod_cate') == 10) checked @endif>
  				<label for="pca_id1" class="form-check-label">Category 1</label>
  			</div>
  			<div class="form-check">
  				<input type="radio" name="prod_cate" id="pca_id2" value="20" class="form-check-input" @if(old('prod_cate') == 20) checked @endif>
  				<label for="pca_id2" class="form-check-label">Category 2</label>
  			</div>
  			<div class="form-check">
  				<input type="radio" name="prod_cate" id="pca_id3" value="30" class="form-check-input"  @if(old('prod_cate') == 30) checked @endif>
  				<label for="pca_id3" class="form-check-label">อื่น ๆ</label>
  			</div>
			@error('prod_cate')
			    <span class="text-danger form-text">{{ $message }}</span>
			@enderror
  		</div>
		<div class="mb-3"> 
			<label for="pa_id" class="form-label">จำนวนสินค้า<span class="text-danger form-text">*</span>:</label><br />
			<input type="text" id="pa_id" name="prod_amount" value="{{ old('prod_amount') }}" class="form-control">
			@error('prod_amount')
			    <span class="text-danger form-text">{{ $message }}</span>
			@enderror
		</div>
		<div class="mb-3"> 
			<label for="pp_id" class="form-label">ราคาสินค้า<span class="text-danger form-text">*</span>:</label><br />
			<input type="text" id="pp_id" name="prod_price" value="{{ old('prod_price') }}" class="form-control">
			@error('prod_price')
			    <span class="text-danger form-text">{{ $message }}</span>
			@enderror
		</div>
  		<div class="mb-3">
		<label class="form-label">สถานะ:</label>
			<div class="form-check">
  				<input type="radio" name="prod_status" id="pst_id1" value="10" class="form-check-input" checked>
  				<label for="pst_id1" class="form-check-label">มีสินค้า (In stock)</label>
  			</div>
  			<div class="form-check">
  				<input type="radio" name="prod_status" id="pst_id2" value="20" class="form-check-input">
  				<label for="pst_id2" class="form-check-label">ไม่มีสินค้า (Out of stock)</label>
  			</div>
  		</div>
  		<div class="mb-3">
			<label for="pss_id" class="form-label">ผู้ผลิต<span class="text-danger form-text">*</span>:</label>
			<select id="pss_id" name="prod_supp" class="form-control">
				<option value="">ระบุ</option>
				<option value="10" @if(old('prod_supp') == '10') selected @endif>Supplier 1</option>
				<option value="20" @if(old('prod_supp') == '20') selected @endif>Supplier 2</option>
				<option value="30" @if(old('prod_supp') == '30') selected @endif>Supplier 3</option>
				<option value="40" @if(old('prod_supp') == '40') selected @endif>Supplier 4</option>
			</select>
			@error('prod_supp')
			    <span class="text-danger form-text">{{ $message }}</span>
			@enderror
		</div>
		<div class="mb-3 d-flex justify-content-center">
			<button type="submit" class="btn btn-primary m-1">เพิ่มข้อมูล</button>
			<button type="reset" class="btn btn-secondary m-1">เคลียร์</button>
		</div>
	</form>
	</div>
	<p class="d-flex justify-content-start">
          <a href="/products" class="btn btn-warning">ย้อนกลับ</a>
    </p>
</div>

@include('templates.footer')