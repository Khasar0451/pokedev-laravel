<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.cdnfonts.com/css/pokemon-solid" rel="stylesheet">
    <title>Document</title>
    <style>
        h1 {
            color:yellow;               
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: rgb(43, 101, 209);
            font-family: 'Pokemon Solid', sans-serif;
        }
    </style>
</head>

<body>
    <a href="/"> 
        <h1>Pokédex</h1>
    </a>
    {{ $slot }}
</body>

</html>
