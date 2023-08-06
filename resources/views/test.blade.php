<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    tesst {{  $nom }}
    <h1> {{ $item[1] }} </h1>


    @foreach ($lang as $item)

        <h1> {{ $item }} </h1>

    @endforeach
</body>
</html>
