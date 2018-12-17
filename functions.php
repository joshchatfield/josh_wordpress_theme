

<?php

function add_josh_styles_and_scripts() {

    wp_enqueue_style( 'josh.css', get_stylesheet_directory_uri() . '/css/josh.css');
    wp_enqueue_script( 'josh.js', get_template_directory_uri() . '/js/josh.js', array(),'1.0', true);
}
add_action( 'wp_enqueue_scripts', 'add_josh_styles_and_scripts' );

function setup_josh_theme() {
    
    // my template hierarchy wasn't working before I did this
    flush_rewrite_rules();

    add_theme_support('menus');
    register_nav_menu( 'primary', 'primary menu' );
    register_nav_menu( 'sidebar', 'sidebar menu' );

    // register custom post type 'form'
    register_post_type( 'form', array(
        'labels' => array(
            'name' =>'form',
        ),
        'public' => true,
        'has-archive' => true,
    ) );

}

add_action('init','setup_josh_theme');











// these are the necessary functions for daily_reports
show_admin_bar( false );

add_action('admin_post_nopriv_daily_morning_report', 'process_report_not_logged_in');

function process_report_not_logged_in() {
    wp_redirect(get_home_url() . '/wp-login');
    echo '<h1> Please Log In Before Submitting a Report';
    exit();
}

add_action('admin_post_daily_morning_report','process_daily_morning_report');

function process_daily_morning_report() {
        
   
    

    function create_report_daily_morning() {
    // This works to create a table but not so well for other operations (when a variable is involved)
    // because it is hard to put the variable properly in quotes inside of the sql statement
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'report_daily_morning';

        $sql = "CREATE TABLE $table_name (
            id int(9) AUTO_INCREMENT,
            user_id INT(6),
            date DATE,
            length VARCHAR(20),
            awakening_yoga VARCHAR(20),
            offering_essential_eight_enjoyments varchar(20),
            offering_five_sense_enjoyments varchar(20),
            full_prostrations int(6),
            sacred_substances varchar(20),
            heartfelt_supplication varchar(20),
            bishekapashya_breathing_shamatha varchar(20),
            mindful_prostration varchar(20),
            clear_purification varchar(20),
            self_healing_with_wisdom_power varchar(20),
            avalokiteshvara varchar(20),
            vajra_blessing_mantra varchar(20),
            specified_tantra_practice varchar(20),
            UNIQUE KEY id (id)
        ) $charset_collate;";
        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }

    function insert_to_report_daily_morning() {
        // this works to insert/delete/update where $arg is my data variable
        global $wpdb;
        $table = $wpdb->prefix.'report_daily_morning';
        $data = array(
            'user_id' => get_current_user_id( ),
            'date' => $_POST['date'],
            'length' => $_POST['length'],
            'awakening_yoga'=> $_POST['awakening_yoga'],
            'offering_essential_eight_enjoyments'=> $_POST['offering_essential_eight_enjoyments'],
            'offering_five_sense_enjoyments'=> $_POST['offering_five_sense_enjoyments'],
            'full_prostrations'=> $_POST['full_prostrations'],
            'sacred_substances'=> $_POST['sacred_substances'],
            'heartfelt_supplication'=> $_POST['heartfelt_supplication'],
            'bishekapashya_breathing_shamatha'=> $_POST['bishekapashya_breathing_shamatha'],
            'mindful_prostration'=> $_POST['mindful_prostration'],
            'clear_purification'=> $_POST['clear_purification'],
            'self_healing_with_wisdom_power'=> $_POST['self_healing_with_wisdom_power'],
            'avalokiteshvara'=> $_POST['avalokiteshvara'],
            'vajra_blessing_mantra'=> $_POST['vajra_blessing_mantra'],
            'specified_tantra_practice'=> $_POST['specified_tantra_practice'],
        );
        $format = array('%d','%s','%s','%s','%s','%s','%d','%s','%s','%s','%s','%s','%s','%s','%s','%s');
        $wpdb->insert($table,$data,$format);
        //echo '0 for error or id of inserted item here: ' . $my_id = $wpdb->insert_id;
    }

    //if I want to see what the form posted
    function print_out_submission(){
        foreach ($_POST as $key => $value){
            echo 'foreach of $_POST: ' . $key . ' ' . $value . '<br>';
        }
    }

    // not necessary, sql won't create the table if it exists
    function create_table_if_needed() {
        $table_name = $wpdb->prefix . 'report_daily_morning';
        if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
            create_report_daily_morning();
        } else {
            echo 'false';
        }
    }

    // sql will automatically not create if table already exists
    create_report_daily_morning();
    
    // this triggers after submit is pressed, once there is a value then page reload will also trigger,
    // until visiting another page
    if (isset($_POST['date'])) {    
        insert_to_report_daily_morning();
        //print_out_submission();
    }

    wp_redirect(get_home_url());
    exit();

}

add_filter( 'login_redirect', function( $url, $query, $user ) {
	return home_url();
}, 10, 3 );
?>
