@include('templates.header')
@include('templates.menu')
<form action="/bmi_cal" method="post">
    @csrf
    <h1>BMI Calculate</h1><br>
    Name : <input type="text" name="myname" id="nameid" value="{{ old('myname') }}"><br>
    Weight : <input type="text" name="mywei" id="namewei"><br>
    Height (m): <input type="text" name="myhei" id="namehei"><br>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">
</form>
