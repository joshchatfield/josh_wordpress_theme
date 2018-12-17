<h1>this is template page-daily-practice-data-display</h1>

<?php

get_header();


global $wpdb;
$table = $wpdb->prefix.'daily_practice';
//$data = array('practice_type' => $arg, 'user_id' => get_current_user_id(  ));
//$format = array('%s','%d');
//$wpdb->insert($table,$data,$format);
$current_user = get_current_user_id(  );
//$my_practice = $wpdb->get_row( "SELECT * FROM $table WHERE user_id = $current_user" );
$my_practice = $wpdb->get_results( "SELECT * FROM $table WHERE user_id = $current_user" );


/* these work with get results
echo $my_practice[0]->id;

foreach($my_practice as $row){
    echo $row->id;
}
*/

/* this works wit get row
foreach($my_practice as $key => $value){
    //echo 'practice_type: ' . $my_practice->practice_type . '<br>';
    echo $key . ': ' . $value. '<br>';
}
*/

?>