<?php
get_header();
?>

<h1>This is singular</h1>


<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_title();

    }
} else {
    // if no posts
    echo 'there are no posts';
}

get_footer();
?>