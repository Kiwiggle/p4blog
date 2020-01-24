<!DOCTYPE html>
<html lang="fr">
    <head>

        <title><?= $title ?></title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://fonts.googleapis.com/css?family=Baskervville|Source+Sans+Pro:200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="public/css/style.css">

        <script src="public/js/ajax.js"></script>

        <!-- TINY MCE -->

        <script src="https://cdn.tiny.cloud/1/h4dzqfr7d40mo3ny19nvu1fm07b73ygqqsb2i3irhs5faume/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
        <script>
            tinymce.init({
                selector: '#textarea'
            });
        </script>

        <!-- LEAFLET & OPENSTREETMAP -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
        integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
        crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
        integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
        crossorigin=""></script>
    </head>
            
    <body>
        <?= $content ?>

        <!-- SCRIPTS JS -->
        <script src="public/js/map.js"></script>
        <script src="public/js/main.js"></script>
    </body>

    
</html>