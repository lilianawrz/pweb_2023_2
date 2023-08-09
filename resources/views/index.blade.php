<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <p>Bem vinda grande mestre:</p>

    @foreach ($pessoas as $pessoas)
        <p>{{ $pessoas }}</p>
    @endforeach

</body>

</html>
