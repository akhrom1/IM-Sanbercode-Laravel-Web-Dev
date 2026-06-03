<!doctype html>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Welcome</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="" />
</head>

<body>
    <header>
        <h1>Selamat Datang {{$first}} {{$last}}</h1>
    </header>
    <p>Gender: {{ $gender }}</p>
    <p>Nationality: {{ $nationality }}</p>
    <p>Language: {{ implode(', ', $language) }}</p>
    <p>Bio: {{ $bio }}</p>
    <h2>
        Terima kasih telah bergabung di Sanberbook. Social Media kita bersama!
    </h2>

    <script src="" async defer></script>
</body>

</html>