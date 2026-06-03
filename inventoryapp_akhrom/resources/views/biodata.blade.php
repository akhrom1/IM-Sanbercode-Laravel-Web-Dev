<!doctype html>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Form</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="" />
</head>

<body>
    <header>
        <h1>Buat Akun Baru</h1>
    </header>

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

    <script src="" async defer></script>
</body>

</html>