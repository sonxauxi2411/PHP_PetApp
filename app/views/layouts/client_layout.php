<html>

<head>
    <title>Website</title>
    <meta charset="utf-8">
    <link type='text/css' rel='stylesheet' href='<?php echo _WEB_PATH_  ?>/public/assets/css/style.css' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class='container'>
        <div class=''>
            <?php
            $this->render('blocks/navbar');
            ?>
        </div>
        <div class="py-4">
            <?php
            $this->render($content, $sub_content);
            ?>
        </div>

    </div>

</body>

</html>