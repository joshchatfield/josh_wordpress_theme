
<?php

$obj_id = get_queried_object_id();
$current_url = get_permalink( $obj_id );
echo $current_url;
echo get_home_url();

// if no user logged in redirect to login page



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
