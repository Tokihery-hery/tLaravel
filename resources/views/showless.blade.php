<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>  
<x-header/>
    <div>
    salut tokihery de aohoan les zany eu
    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
       <x-gallerie>
            <p>here is image from galerie</p>
       </x-gallerie>
        <input type="file" name="image">
        <input type="submit" value="Upload image">
    </form>
    </div>
<x-footer/>
</body>
</html>