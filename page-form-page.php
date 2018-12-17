
<!-- this will be the template just for the report_daily_morning -->

<?php get_header(  ); ?>

<style>
h1, h2, h3 {
    width: 100%;
    text-align: center;
    margin: 20px;
}
</style>

<h2>Daily Morning Report</h2>

<div><!-- form wrapper div -->

<form action = '<?php echo get_home_url() . '/wp-admin/admin-post'; ?>' method = "POST" enctype = "multipart/form-data"
    style='margin: auto; max-width: 700px; box-shadow: 0px 0px 2px lightblue; padding: 20px;
    border-radius: 5px;'>

<input type='hidden' name='action' value='daily_morning_report'>

<div class='row'>
    <div class='col-sm-6'>
        <div class="form-group">
            <label for='date_field'>Date</label>
            <input class='form-control' type='date' name='date' id='date_field'>
        </div>
    </div>    

    <div class='col-sm-6'>
        <div class="form-group">
            <label>Length</label>
            <select name='length' class='form-control'>
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
                <label>Awakening Yoga</label>
                <select name='awakening_yoga' class='form-control'>
                    <option value='complete'>Complete</option>
                    <option value='not_complete'>Not Complete</option>
                </select>
            </div>
        </div>

        <div class='col-sm-6'>
            <div class="form-group">
                <label>Offering Essential Eight Enjoyments</label>
                <select name='offering_essential_eight_enjoyments' class='form-control'>
                    <option value='complete'>Complete</option>
                    <option value='not_complete'>Not Complete</option>
                </select>
            </div>
        </div>
    </div>


<div class='row'>
    <div class='col-sm-6'>
        <div class="form-group">
            <label>Offering Five Sense Enjoyments</label>
            <select name='offering_five_sense_enjoyments' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>

    <div class='col-sm-6'>
        <div class="form-group">
        <label>Full Prostrations</label>
            <input type='number' name='full_prostrations' value='3' class='form-control'>
        </div>
    </div>
</div>

<div class='row'>
    <div class='col-sm-6'>
        <div class="form-group">
            <label>Sacred Substances</label>
            <select name='sacred_substances' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>

    <div class='col-sm-6'>
        <div class="form-group">
            <label>Heartfelt Supplication</label>
            <select name='heartfelt_supplication' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>
</div>
     
<div class='row'>
    <div class='col-sm-6'>
        <div class="form-group">
            <label>Bishekapashya Breathing Shamatha</label>
            <select name='bishekapashya_breathing_shamatha' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>
    
    <div class='col-sm-6'>
        <div class="form-group">
            <label>Mindful Prostration</label>
            <select name='mindful_prostration' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>
</div>
    
<div class='row'>
    <div class='col-sm-6'>
        <div class="form-group">
            <label>Clear Purification</label>
            <select name='clear_purification' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>

    <div class='col-sm-6'>
        <div class="form-group">
            <label>Self Healing With Wisdom Power</label>
            <select name='self_healing_with_wisdom_power' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>
</div>

<div class='row'>
    <div class='col-sm-4'>
        <div class="form-group">
            <label>Avalokiteshvara</label>
            <select name='avalokiteshvara' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>

    <div class='col-sm-4'>
        <div class="form-group">
            <label>Vajra Blessing Mantras</label>
            <select name='vajra_blessing_mantra' class='form-control'>
                <option value='complete'>Complete</option>
                <option value='not_complete'>Not Complete</option>
            </select>
        </div>
    </div>

    <div class='col-sm-4'>
        <div class="form-group">
            <label>Specified Tantra Practice</label>
            <select name='specified_tantra_practice' class='form-control'>
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

<?php get_footer(  ); ?>
