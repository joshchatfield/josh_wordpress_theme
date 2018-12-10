
<?php
get_header();
?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

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
?>

        </main>
    </div>
</div>

<?php get_footer(); ?>
