
<?php
get_header();
wp_mail( 'joshchafield@gmail.com', 'hello there', 'this is my email message', '', array() );
?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <h1>This is the Index Template</h1>

            <!--
            <form>
                <input><br><br>
                <input type="checkbox"><br><br>
                <select>
                    <option>hello</option>
                    <option>something</option>
                    <option>something</option>
                    <option>hello</option>
                </select><br><br>
            </form>
            -->

            <?php
                $args = array(
                    'posts_per_page' => '-1',
                    'post_type' => 'form',
                );

                $myForms = new WP_Query($args);
                while ($myForms->have_posts()){
                    $myForms->the_post(); ?>
                    <h1><?php the_title(); ?></h1>
                <?php } ?>


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

        </main>
    </div>
</div>

<?php get_footer(); ?>
