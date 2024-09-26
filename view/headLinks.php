<?php

class link {

    function top($ruta){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Bank Account</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <link rel="stylesheet" href="<?= $ruta ?>/assets/CSS/index.css">
            <link rel="stylesheet" href="<?= $ruta ?>/assets/CSS/sidebar.css">
            <link rel="stylesheet" href="<?= $ruta ?>/assets/CSS/chart.css">
        </head>
        <body>
        <?php
    }

    function buttom($ruta) {
        ?>
        <script src="<?= $ruta ?>/assets/JS/index.js"></script>
        <script src="<?= $ruta ?>/assets/JS/sidebar.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
        <script src="<?= $ruta ?>/assets/JS/chart.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>
        </html>
        <?php
    }
}
?>