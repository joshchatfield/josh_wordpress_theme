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
$todays_date = $full_year . '-' . $two_digit_month . '-' . $date;

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

$jc_current_user = get_current_user_id(  );

global $wpdb;
$morning_results = $wpdb->get_results( "SELECT * FROM wp_report_daily_morning WHERE user_id = $jc_current_user
 AND date between '$beggining_of_month' and '$end_of_month'", OBJECT );

$evening_results = $wpdb->get_results( "SELECT * FROM wp_report_daily_evening WHERE user_id = $jc_current_user
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
    .jc-wrapper {
        width: 100%;
        margin: 50px 0px 50px 0px;
    }
    .jc-contents {
        text-align: center;
        margin: auto;
        max-width: 700px;
        padding: 20px;
        box-shadow: 0px 0px 3px lightblue;
        border-radius: 5px;
    }
    .jc-object{
        text-align: left;
        max-width: 100%;
        margin: 10px;
        /*box-shadow: 0px 0px 3px lightblue;*/
        border-radius: 5px;
        height: 50px;
    }
    .jc-object-tag {
        border-radius: 5px;
        display: inline-block;
        background: hsl(200, 100%, 50%);
        color: white;
        font-weight: bold;
        width: 50px;
        padding: 15px 0px 0px 15px;
        height: 100%;
    }
    .jc-object-info{
        color: white;
        font-weight: bold;
        border-radius: 5px;
        display: inline-block;
        width: 100px;
        padding: 15px 0px 0px 15px;
        height: 100%;
    }
    h1,h2,h3,h4 {
        margin: 20px;
        width:100%;
        text-align: center;
    }
</style>
</head>
<!--current logged in user date table-->
<div class='jc-wrapper'>
    <div class='jc-contents'>
        <h1>My Month's Results</h1>
        <h3><?php echo $month_names[$month_number-1]; ?></h3>
    <div class='jc-object' style='background:hsl(200,100%,95%);text-align:center;'>
        <?php //echo $message; ?>
    </div>
<?php for($i = 0; $i < $days_in_month; $i++){ ?>
        <div class='jc-object'>
            <div class='jc-object-tag'>
                <?php echo $i+1; ?>
            </div>
                <?php
                    $t = $i+1; 
                    if($morning_practice_on_date_arr[$i]){
                        echo '<a href="' . home_url() . '/form-page/?user=' . get_current_user_id() . '&date=' . $full_year . '-' . $two_digit_month . '-' . $t . '&table=wp_report_daily_morning' . '">';
                        echo "<div style='background: green' class='jc-object-info'>";
                        echo 'Morning';
                        echo "</div>";
                        echo '</a>';
                    } else {
                        echo "<div style='background: red' class='jc-object-info'>";
                        echo 'Morning';
                        echo "</div>";
                    }
                ?>
                <?php 
                if($evening_practice_on_date_arr[$i]){
                    echo "<div style='background: green' class='jc-object-info'>";
                    echo 'Evening';
                    echo "</div>";
                } else {
                    echo "<div style='background: red' class='jc-object-info'>";
                    echo 'Evening';
                    echo "</div>";
                }
                ?>
            </div>
        <?php } ?>
    </div>
</div>
