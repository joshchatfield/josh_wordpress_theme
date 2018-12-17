<?php get_header(); ?>

<h1>single-form.php template</h1>

<?php
/*
$args = array(
    'posts_per_page' => '-1',
    'post_type' => 'form',
);

$myForms = new WP_Query($args);
while ($myForms->have_posts()){
    $myForms->the_post();

    the_title();
    the_content();
}
*/

?>



<?php
if (have_posts()) {
    while (have_posts()) {
        echo '<br>';
        the_title();
        echo '<br>';
        the_post();
        echo '<br>';
        the_time('F j, y');
        echo 'at: ';
        the_time('g:i a');
        echo '<br>';
        the_content();
        echo '<br>';
    }
} else {
    // if no posts
    echo 'there are no posts';
}
?>


<?php get_footer(); ?>
