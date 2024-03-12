<div>
    @include('templates.header')
    @include('templates.menu')
</div>

@php
    $counter = 1;
    $day = 3;
    $name = "Beritokai";
@endphp

<div>
    Hello, {{ $name }}. <br />
    The current UNIX timestamp is {{ time() }}.<br />

    @unless (Auth::check())
        You are not signed in.
    @endunless

    <h1>Raw PHP</h1>
    {{ $counter }}
</div>

@switch($day)
    @case(2)
        <p>Monday</p>
        @break
 
    @case(3)
        <p>Tuesday</p>
        @break
 
    @default
        <p>Sunday</p>
@endswitch

@php
    $users = [
        (object)["name"=>"Admin"],
        (object)["name"=> "Staff"],
        (object)["name"=>"Guest"]
    ];
    $cars = ["Toyota","Volvo","Benz"];
@endphp

@forelse ($cars as $car)
    <li>{{ $car }}</li>
@empty
    <p>No users</p>
@endforelse

@php
    $products = [
        (object)["name"=>"Aaa","version"=>"1.2"],
        (object)["name"=> "Aaa","version"=>"1.0"],
        (object)["name"=>"Aaa","version"=>"1.1"]
    ];
@endphp

<form>
<h1>Product Form:</h1>
Product active: <input type="checkbox"
name="active"
value="active"
@checked(old('active', true)) /><br />

Product version: <select name="version">
    @foreach ($products as $product)
        <option value="{{ $product->version }}" @selected(old($product->version) == $product->version)>
            {{ $product->version }}
        </option>
    @endforeach
</select><br />

Contact supplier: <input type="email"
name="email"
value="email@laravel.com"
@readonly(true) /><br />

Title: <input type="text"
name="title"
value="title"
@required(false) /><br />

<button type="submit" @disabled($errors->isNotEmpty())>Submit</button>
</form><br />

<label for="title">Post Title</label>
 
<input id="title"
    type="text"
    class="@error('title') is-invalid @enderror">
 
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

@php
$check = "PASSED";
@endphp

@isset($check)
  "QC Passed.
@endisset

@php
$check = "";
@endphp

@isset($check)
  QC Failed.
@endisset

<br /><br /><br />

<div>
    @include('templates.footer')
</div>