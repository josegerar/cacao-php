<!DOCTYPE html>
<html lang="es">

    <head>
        <title><?php echo COMPANY; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo SERVERURL; ?>views/css/page_404.css" />
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"  crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://use.fontawesome.com/fdb1a5c471.js"></script>
        <script>
            const serverURL = "<?php echo SERVERURL; ?>";
        </script>
    </head>

    <body>

        <section id="nav">
            <?php require_once './views/modules/navBar.php'; ?>
        </section>

        <section id="content-main">
            <?php require_once './views/contents/home-view.php'; ?>
        </section>

        <section id="fotter">
            <?php require_once './views/modules/footer.php'; ?>
        </section>
        <script src="<?php echo SERVERURL; ?>views/js/paginate.js"></script>
        <script defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLEAPIKEY; ?>"></script>
    </body>

</html>