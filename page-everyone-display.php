    <!-- my month's results -->

<?php

date_default_timezone_set('America/Los_Angeles') . '<br>';

$date = date('d');
$two_digit_month = date('m');
$month_number = date('n');
$full_year = date('Y');
$days_in_month = cal_days_in_month(CAL_GREGORIAN, $month_number, $full_year); // 31
$jd=gregoriantojd($month_number, $date, $full_year);
$day_of_week = jddayofweek($jd,0);
$beggining_of_month = $full_year . '-' . $two_digit_month . '-' . '01';
$end_of_month = $full_year . '-' . $two_digit_month . '-' . $days_in_month;

$month_names = Array(
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
);



$jc_names = Array();
$jc_evening_percentage = Array();
$jc_morning_percentage = Array();

global $wpdb;
$jc_users_results = $wpdb->get_results( "SELECT * FROM wp_users", OBJECT );

foreach($jc_users_results as $jc_user){
    array_push($jc_names,$jc_user->display_name);

$my_current_user_id = $jc_user->ID;

global $wpdb;
$morning_results = $wpdb->get_results( "SELECT * FROM wp_report_daily_morning WHERE user_id = $my_current_user_id
AND date between '$beggining_of_month' and '$end_of_month'", OBJECT );

$evening_results = $wpdb->get_results( "SELECT * FROM wp_report_daily_evening WHERE user_id = $my_current_user_id
AND date between '$beggining_of_month' and '$end_of_month'", OBJECT );

$morning_practice_on_date_arr = Array(); // holds if they have an entry for that day
for($i=0;$i<$days_in_month;$i++){
    array_push($morning_practice_on_date_arr, false);
}

$evening_practice_on_date_arr = Array(); // holds if they have an entry for that day
for($i=0;$i<$days_in_month;$i++){
    array_push($evening_practice_on_date_arr, false);
}

for($i = 1; $i <= $days_in_month; $i++){
    
    if($i < 10){
        $i = '0'.$i;
    }

    $full_date_in_loop_1 = $full_year . '-'. $two_digit_month .'-'. $i;
    
    for($t = 0; $t < count($morning_results); $t++){
        $full_date_in_loop_2 = $morning_results[$t]->date;

        if($full_date_in_loop_1 === $full_date_in_loop_2){
            $morning_practice_on_date_arr[$i-1] = true;
        }
    }

    for($t = 0; $t < count($evening_results); $t++){
        $full_date_in_loop_2 = $evening_results[$t]->date;

        if($full_date_in_loop_1 === $full_date_in_loop_2){
            $evening_practice_on_date_arr[$i-1] = true;
        }
    }
}

$evening_count = 0;
$morning_count = 0;
for($i = 0; $i < count($evening_practice_on_date_arr); $i++){
    if($evening_practice_on_date_arr[$i] === true){
        $evening_count++;
    }
}

for($i = 0; $i < count($morning_practice_on_date_arr); $i++){
    if($morning_practice_on_date_arr[$i] === true){
        $morning_count++;
    }
}

$evening_percent = floor($evening_count/$date*100);
$morning_percent = floor($morning_count/$date*100);

array_push($jc_evening_percentage,$evening_percent);
array_push($jc_morning_percentage,$morning_percent);
}

/*
switch ($evening_percent) {
    case label1:
        code to be executed if n=label1;
        break;
    case label2:
        code to be executed if n=label2;
        break;
    case label3:
        code to be executed if n=label3;
        break;
    ...
    default:
        code to be executed if n is different from all labels;
}
*/

?>

<!-- HTML -->

<head>

    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='<?php echo get_stylesheet_directory_uri() . "/jc-styles.css";?>'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<style>
</style>

</head>
<div class='jc-wrapper'>
    <div class='jc-contents'>
        <h1>Everyone's Results</h1>
        <h3><?php echo $month_names[$month_number-1]; ?></h3>
    
    <!--
        <div class='jc-object' style='background:hsl(200,100%,95%);text-align:center;'>
        <?php echo $message; ?>
    </div>
    -->
    <div class='jc-object'>
            <div class='jc-object-tag' style='background:white;'>
                <?php ?>
            </div>
            <div class='jc-object-info'>
                <?php echo 'Morning'; ?>
            </div>
            <div class='jc-object-info'>
                <?php echo 'Evening'; ?>
            </div>
        </div>
<?php for($i = 0; $i < count($jc_names); $i++){ ?>
        <div class='jc-object'>
            <div class='jc-object-tag'>
                <?php echo $jc_names[$i]; ?>
            </div>
            <div class='jc-object-info'>
                <?php echo $jc_morning_percentage[$i] . '%'; ?>
            </div>
            <div class='jc-object-info'>
                <?php echo $jc_evening_percentage[$i] . '%'; ?>
            </div>
            </div>
        <?php } ?>
    </div>
</div>
