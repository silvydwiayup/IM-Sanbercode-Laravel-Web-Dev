@extends('home')
@section('bodyContent')
    
<h1>Buat Account Baru!</h1>
<h3>Sign Up Form</h3>

<form action="" method="post">
    @csrf

    <!-- <input type="submit" value="kirim"> -->
    <label for="first_name">First name :</label><br><br>
    <input type="text" name="firstname" id="first_name"><br><br>
    <label for="last_name">Last name :</label><br><br>
    <input type="text" name="lastname" id="last_name">

    <p>Gender :</p>
        <input type="radio" name="gender" id="male" value="Male">
        <label for="male">Male</label><br>
        <input type="radio" name="gender" id="female" value="Female">
        <label for="Female">Female</label><br>
        <input type="radio" name="gender" id="other" value="Other">
        <label for="other">Other</label>

    <br>

    <p>Nationality</p>
    <select name="nationality" id="nationality">
        <option value="Indonesia">Indonesia</option>
    </select>


    <p>Language Spoken :</p>
        <input type="checkbox" name="language" id="indonesia" value="Indonesia">
        <label for="indonesia">Bahasa Indonesia</label><br>
        <input type="checkbox" name="language" id="english" value="English">
        <label for="english">English</label><br>
        <input type="checkbox" name="language" id="other" value="Other">
        <label for="other">Other</label>

    <p>Bio :</p>
    <textarea name="message" rows="10" cols="30"></textarea>
    <br>
    <button type="submit">Sign Up</button>

</form>
@endsection
    