<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="/assets/css/table.css" />
        <link rel="stylesheet" type="text/css" href="/assets/css/top.css" />
        <title>야몬 방명록</title>
    </head>
    <body>
        <!-- top banner -->
        <div class="d-flex banner">
            <div class="banner-img"></div>
        </div>

        <!-- main content -->
        <div class="container">
            <?php echo view($viewName); ?>
        </div>
    </body>
</html>
