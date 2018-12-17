<?php
get_header();
?>

<h1>This is template page.php</h1>


<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_title();
        the_content();
    }
} else {
    // if no posts
    echo 'there are no posts';
}

get_footer();
?>