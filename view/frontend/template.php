<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="public/css/style.css">
        <title><?= $title ?></title>

        <script src="https://cdn.tiny.cloud/1/h4dzqfr7d40mo3ny19nvu1fm07b73ygqqsb2i3irhs5faume/tinymce/5/tinymce.min.js" referrerpolicy="origin"/></script>
        <script>
            tinymce.init({
                selector: '#textarea'
            });
        </script>
    </head>
            
    <body>
        <?= $content ?>
    </body>
</html>