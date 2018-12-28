
<?php

//SQL
ALTER TABLE wp_report_daily_evening 
ADD CONSTRAINT UniqueDate
UNIQUE(date, user_id);

// not necessary, sql won't create the table if it exists
function create_table_if_needed() {
    $table_name = $wpdb->prefix . 'report_daily_morning';
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        create_report_daily_morning();
    } else {
        echo 'false';
    }
}


//works
$obj_id = get_queried_object_id();
$current_url = get_permalink( $obj_id );
echo $current_url;
echo get_home_url();

// doesn't work, why?
global $wp;
echo home_url( $wp->request )

//works
echo '//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


// only show link to form-page if logged in
if(get_current_user_id() !== 0){
    echo '<a href="/wordpress1/form-page">FORM</a>';
}


/*
necessary for daily reports

if logged in
identify user priveledge of 1
current
redirect if current page is wp-login, or wp-admin
*/


function go_to_reports_after_login() {
$obj_id = get_queried_object_id();
$current_url = get_permalink( $obj_id );
$loginurl = get_home_url() . '/wp-login';
$adminurl = get_home_url() . '/wp-admin';

    if(get_current_user_id() !== 0 && !current_user_can('edit_posts') && 
        ($current_url === $loginurl || $current_url === $adminurl)) {
        wp_redirect(get_home_url() . '/form-page');
        exit();
    } else {
//        echo get_current_user_id(  );
//        echo 'hello world2';
    }
}

function test() {
    $obj_id = get_queried_object_id();
    $current_url = get_permalink( $obj_id );
    echo $current_url;
    echo 'hello world';
    
    if('yes' === 'yes'){
        wp_redirect(get_home_url());
        exit();
    }
}

add_action('init', 'test');

?>
