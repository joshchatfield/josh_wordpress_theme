<html>
    <head>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class() ?>>
        <header>
            <?php wp_nav_menu(array(
                'theme_location'=>'primary'
            ))?>

        </header>