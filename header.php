<html>
    <head>
        <?php wp_head(); ?>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
    </head>
    <body <?php body_class() ?>>
        <header>
            <?php wp_nav_menu(array(
                'theme_location'=>'primary'
            ))?>

        </header>