@include('templates.header')
@include('templates.menu')

<div style="text-align: center;">
  <h1>Welcome to Laravel.</h1>
  <p><img src="{{ asset('images/liverpool.png') }}" style="width: 250px;"></p>
  <h3>Class: Web Programming</h3>
</div>
<br />
<!-- <div class="container">
  <h1>jQuery Test:</h1>
  <article></article>
</div>
<script type="module">
$(document).ready(function(){
  $('article').html('<h1>Hello World!</h1>');
});    
</script> -->

@include('templates.footer')