@extends('layouts.master')

@section('title')
Pendaftaran
@endsection

@section('content')

<h2>Sign Up Form</h2>

<form action="/welcome" method="POST">
    @csrf

    <label>First name:</label><br />
    <input type="text" name="first" /><br />
    <label>Last name:</label><br />
    <input type="text" name="last" /><br /><br />

    <p>Gender</p>
    <input type="radio" id="male" name="gender" value="Male" />
    <label for="male">Male</label><br />

    <input type="radio" id="female" name="gender" value="Female" />
    <label for="female">Female</label><br />

    <input type="radio" id="other" name="gender" value="Other" />
    <label for="other">Other</label>

    <p>Nationality :</p>

    <select name="nationality" id="nationality">
        <option value="indonesia">Indonesia</option>
        <option value="india">India</option>
        <option value="singapure">Singapure</option>
        <option value="malaysia">Malaysia</option>
    </select>

    <p>Language Spoken :</p>

    <input type="checkbox" id="idn" name="language[]" value="indonesia" checked />
    <label for="idn">Indonesia</label><br />

    <input type="checkbox" id="english" name="language[]" value="english" />
    <label for="english">English</label><br />

    <input type="checkbox" id="art" name="language[]" value="other" />
    <label for="other">Other</label>

    <p>Bio :</p>

    <textarea rows="8" cols="50" name="bio"></textarea>

    <br />
    <input type="submit" value="Submit" />
</form>

@endsection