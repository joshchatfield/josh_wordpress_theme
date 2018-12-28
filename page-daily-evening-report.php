
<!-- this will be the template just for the report_daily_evening -->

<?php get_header(  ); ?>

<div><!-- form wrapper div -->
<?php
if(do_shortcode('[sample]')){
    echo 'if statement triggered';
} else {
    echo 'not triggered';
} ?>
<form action = '<?php echo get_home_url() . '/wp-admin/admin-post'; ?>' method = "POST" enctype = "multipart/form-data"
    style='margin: auto; max-width: 700px; box-shadow: 0px 0px 2px lightblue; padding: 20px;
    border-radius: 5px;'>

<div id='evening_report_message' style='margin: 0px; padding: 10px; background: hsl(50, 100%, 50%); color: white;text-align: center;
    display: none;'>
</div>

<input type='hidden' name='action' value='daily_evening_report'>

<div class='row'>
    <div class='col-sm-6'>
        <div class="form-group">
            <label >Date</label>
            <input class='form-control' type='date' name='date'>
        </div>
    </div>    

    <div class='col-sm-6'>
        <div class="form-group">
            <label>Length</label>
            <select name='length' class='form-control' onchange='on_length_change()'>
                <option value='custom'>Custom</option>
                <option value='concise'>Concise</option>
                <option value='moderate'>Moderate</option>
                <option value='elaborate'>Elaborate</option>
            </select>
        </div>
    </div>
</div>

<input style='width: 100%;' type='submit' class='btn btn-primary'>

    <hr>

    <div class='row'>
        <div class='col-sm-6'>
            <div class="form-group">
                <label>Light Offering</label>
                <select name='light_offering' class='form-control'>
                    <option value='complete'>Complete</option>
                    <option value='not_complete'>Not Complete</option>
                </select>
            </div>
        </div>

        <div class='col-sm-6'>
            <div class="form-group">
                <label>Mandala Offering</label>
                <input type='number' name='mandala_offering' class='form-control'>
            </div>
        </div>
    </div>


<div class='row'>
    <div class='col-sm-6'>
        <div class="form-group">
            <label>Seven Line Prayer</label>
            <input type='number' name='seven_line_prayer' class='form-control'>
        </div>
    </div>

    <div class='col-sm-6'>
        <div class="form-group">
            <label>Guru Yoga</label>
            <select name='guru_yoga' class='form-control'>
                <option value='concise'>Concise</option>
                <option value='moderate'>Moderate</option>
                <option value='elaborate'>Elaborate</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>
</div>

<div class='row'>
    <div class='col-sm-6'>
        <div class="form-group">
            <label>Dzogchen Meditation</label>
            <select name='dzogchen_meditation' class='form-control'>
                <option value='concise'>Concise</option>
                <option value='moderate'>Moderate</option>
                <option value='elaborate'>Elaborate</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>

    <div class='col-sm-6'>
        <div class="form-group">
            <label>Dharmapala Offering</label>
            <select name='dharmapala_offering' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>
</div>
     
<div class='row'>
    <div class='col-sm-6'>
        <div class="form-group">
            <label>Extraordinary Aspiration and Dedication for Master and Disciples</label>
            <select name='aspiration_master_and_disciples' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>
    
    <div class='col-sm-6'>
        <div class="form-group">
            <label>Expelling Obstacles and Accomplishing Activities prayers</label>
            <select name='expelling_obstacles' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>
</div>
    
<div class='row'>
    <div class='col-sm-6'>
        <div class="form-group">
            <label>Precious Aspiration of the Root and Lineage Masters</label>
            <select name='aspiration_root_and_lineage_masters' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>

    <div class='col-sm-6'>
        <div class="form-group">
            <label>Aspiration of Sugatas Along With Progeny</label>
            <select name='aspiration_sugatas_and_progeny' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>
</div>

<div class='row'>
    <div class='col-sm-4'>
        <div class="form-group">
            <label>Buddha Path Concluding Practice</label>
            <select name='concluding_practice' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>

    <div class='col-sm-4'>
        <div class="form-group">
            <label>Full Prostrations</label>
            <input type='number' name='full_prostrations' class='form-control'>
        </div>
    </div>

    <div class='col-sm-4'>
        <div class="form-group">
            <label>Sleeping Yoga</label>
            <select name='sleeping_yoga' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>        
        </div>
    </div>
</div>

    <hr>
    <input style='width: 100%;' type='submit' class='btn btn-primary'>
</form>
</div><!-- form wrapper div -->

<script>

var today = new Date();
var year = today.getFullYear();
var month = today.getMonth() + 1;
var date = today.getDate();
document.getElementsByName('date')[0].value = year + '-' + month + '-' + date;

document.onload = on_length_change();

function on_length_change() {
    if(document.getElementsByName('length')[0].value === 'custom'){
        document.getElementById('evening_report_message').innerHTML = 'Congratulations For Practicing Today! Please enter your practice details.';
        document.getElementById('evening_report_message').style.display = 'block';
        
        document.getElementsByName('light_offering')[0].value = 'not_complete';
        document.getElementsByName('mandala_offering')[0].value = 0;
        document.getElementsByName('seven_line_prayer')[0].value = 0;
        document.getElementsByName('guru_yoga')[0].value = 'not_complete';
        document.getElementsByName('dzogchen_meditation')[0].value = 'not_complete';
        document.getElementsByName('dharmapala_offering')[0].value = 'not_complete';
        document.getElementsByName('aspiration_master_and_disciples')[0].value = 'not_complete';
        document.getElementsByName('expelling_obstacles')[0].value = 'not_complete';
        document.getElementsByName('aspiration_root_and_lineage_masters')[0].value = 'not_complete';
        document.getElementsByName('aspiration_sugatas_and_progeny')[0].value = 'not_complete';
        document.getElementsByName('concluding_practice')[0].value = 'not_complete';
        document.getElementsByName('full_prostrations')[0].value = 0;
        document.getElementsByName('sleeping_yoga')[0].value = 'not_complete';
    }
    if (document.getElementsByName('length')[0].value === 'concise') {
        document.getElementById('evening_report_message').innerHTML = 'Congratulations For Practicing Concise Practice Today!';
        document.getElementById('evening_report_message').style.display = 'block';

        document.getElementsByName('light_offering')[0].value = 'complete';
        document.getElementsByName('mandala_offering')[0].value = 0;
        document.getElementsByName('seven_line_prayer')[0].value = 3;
        document.getElementsByName('guru_yoga')[0].value = 'concise';
        document.getElementsByName('dzogchen_meditation')[0].value = 'concise';
        document.getElementsByName('dharmapala_offering')[0].value = 'not_complete';
        document.getElementsByName('aspiration_master_and_disciples')[0].value = 'not_complete';
        document.getElementsByName('expelling_obstacles')[0].value = 'not_complete';
        document.getElementsByName('aspiration_root_and_lineage_masters')[0].value = 'not_complete';
        document.getElementsByName('aspiration_sugatas_and_progeny')[0].value = 'not_complete';
        document.getElementsByName('concluding_practice')[0].value = 'complete';
        document.getElementsByName('full_prostrations')[0].value = 3;
        document.getElementsByName('sleeping_yoga')[0].value = 'complete';
    } else if (document.getElementsByName('length')[0].value === 'moderate') {
        document.getElementById('evening_report_message').innerHTML = 'Congratulations For Practicing Moderate Practice Today!';
        document.getElementById('evening_report_message').style.display = 'block';

        document.getElementsByName('light_offering')[0].value = 'complete';
        document.getElementsByName('mandala_offering')[0].value = 3;
        document.getElementsByName('seven_line_prayer')[0].value = 7;
        document.getElementsByName('guru_yoga')[0].value = 'moderate';
        document.getElementsByName('dzogchen_meditation')[0].value = 'moderate';
        document.getElementsByName('dharmapala_offering')[0].value = 'complete';
        document.getElementsByName('aspiration_master_and_disciples')[0].value = 'complete';
        document.getElementsByName('expelling_obstacles')[0].value = 'complete';
        document.getElementsByName('aspiration_root_and_lineage_masters')[0].value = 'complete';
        document.getElementsByName('aspiration_sugatas_and_progeny')[0].value = 'complete';
        document.getElementsByName('concluding_practice')[0].value = 'complete';
        document.getElementsByName('full_prostrations')[0].value = 7;
        document.getElementsByName('sleeping_yoga')[0].value = 'complete';
    } else  if (document.getElementsByName('length')[0].value === 'elaborate') {
        document.getElementById('evening_report_message').innerHTML = 'Congratulations For Practicing Elaborate Practice Today!';
        document.getElementById('evening_report_message').style.display = 'block';

        document.getElementsByName('light_offering')[0].value = 'complete';
        document.getElementsByName('mandala_offering')[0].value = 7;
        document.getElementsByName('seven_line_prayer')[0].value = 21;
        document.getElementsByName('guru_yoga')[0].value = 'elaborate';
        document.getElementsByName('dzogchen_meditation')[0].value = 'elaborate';
        document.getElementsByName('dharmapala_offering')[0].value = 'complete';
        document.getElementsByName('aspiration_master_and_disciples')[0].value = 'complete';
        document.getElementsByName('expelling_obstacles')[0].value = 'complete';
        document.getElementsByName('aspiration_root_and_lineage_masters')[0].value = 'complete';
        document.getElementsByName('aspiration_sugatas_and_progeny')[0].value = 'complete';
        document.getElementsByName('concluding_practice')[0].value = 'complete';
        document.getElementsByName('full_prostrations')[0].value = 21;
        document.getElementsByName('sleeping_yoga')[0].value = 'complete';
    }
}
    
</script>
<?php get_footer(  ); ?>
