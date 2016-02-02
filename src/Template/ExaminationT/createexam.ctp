<script>
$(function() {
    $( "#datepicker" ).datepicker();
    $( "#datepickerReg" ).datepicker();
    $( "#datepickerDef" ).datepicker();
    
$('#locations-other-seenote').click(function() {
if($('#locations-other-seenote').is(':checked'))
$('#examlocationnote').prop('disabled',false);
else
$('#examlocationnote').prop('disabled',true);
$('#examlocationnote').val('');
});    
     });
</script>

<div class="actions columns large-2 medium-3">
    <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">	        
        <li><?= $this->Html->link(__('Home'), ['controller'=>'AdministratorT','action' => 'menuboard']) ?></li>
        <li><?= $this->Html->link(__('Display Exams'), ['controller'=>'ExaminationT','action' => 'displayexam']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller'=>'AdministratorT','action' => 'logout']) ?></li>               
    </ul>
</div>
<div class="examinationT form large-10 medium-9 columns">
    <?= $this->Form->create(); ?>
    <fieldset>
        <legend><?= __('Create Exam') ?></legend>
        <?php
            echo $this->Form->input('Exam_Level', array('type' => 'select', 'empty'=>' ','label'=>'Exam Level','required' => true,'options'=>[ 
             '1'=>'1','2'=>'2','3'=>'3']));
             
         
        
        echo $this->Form->input('Exam_Date', 
        array(
           'id'=>'datepicker', 
           'type'=>'text',
           'required' => true
       
        ));
        
        echo $this->Form->input('Enabled', array('type' => 'select', 'empty'=>' ','label'=>'Enabled','options'=>[ 
             'Yes'=>'Yes','No'=>'No','Deferments Only'=>'Deferments Only']));
         
       echo $this->Form->input('Registration_Deadline', 
        array(
           'id'=>'datepickerReg', 
           'type'=>'text',
           'required' => true
        ));
        echo $this->Form->input('Deferment_Deadline', 
        array(
           'id'=>'datepickerDef', 
           'type'=>'text',
           'required' => true
        ));
        	echo $this->Form->input('US_Enrollment_Fee', array('value' => '1295.00'));           
            echo $this->Form->input('International_Enrollment_Fee', array('value' => '1495.00')); 
            echo $this->Form->input('US_Retest_Fee_Current_Year', array('value' => '250.00'));  
            echo $this->Form->input('US_Retest_Fee_Next_Year', array('value' => '600.00')); 
            echo $this->Form->input('US_Deferment_Fee_Before_Deadline', array('value' => '250.00')); 
            echo $this->Form->input('US_Deferment_Fee_After_Deadline', array('value' => '500.00'));
            echo $this->Form->input('International_Retest_Fee_Current_Year', array('value' => '350.00')); 
            echo $this->Form->input('International_Retest_Fee_Next_Year', array('value' => '700.00')); 
            echo $this->Form->input('International_Deferment_Fee_Before_Deadline', array('value' => '350.00')); 
            echo $this->Form->input('International_Deferment_Fee_After_Deadline', array('value' => '600.00'));
            echo $this->Form->input('Exam_Passing_Score');
            ?>          
           <?php
           echo $this->Form->input('Locations',array('label'=>'List of exam locations (Please check all that apply)', 'type'=>'select', 'multiple'=>'checkbox',
           'options'=>array('Phoenix, AZ'=>'Phoenix, AZ', 'Sacramento, CA'=>'Sacramento, CA',
           'Fairfield, CT'=>'Fairfield, CT','Boston, MA'=>'Boston, MA',
           'Kansas City, MO'=>'Kansas City, MO', 'NewYork, NY'=>'NewYork, NY',
           'Philadelphia, PA'=>'Philadelphia, PA', 'Houston, TX'=>'Houston, TX',
           'Charlotte, NC'=>'Charlotte, NC', 'Greensboro, NC'=>'Greensboro, NC',
           'Los Angeles, CA'=>'Los Angeles, CA', 'San Diego, CA'=>'San Diego, CA',
           'Orlando, FL'=>'Orlando, FL', 'Baltimore, MD'=>'Baltimore, MD',
           'St. Louis, MO'=>'St. Louis, MO', 'Portland, OR'=>'Portland, OR',
           'Nashville, TN'=>'Nashville, TN', 'Arlington, VA'=>'Arlington, VA', 
           'Salt Lake City, UT'=>'Salt Lake City, UT', 'Eden Prairie-MN'=>'Eden Prairie-MN', 
           'Oakland, CA'=>'Oakland, CA',
           'Santa Clara, CA'=>'Santa Clara, CA','Atlanta, GA'=>'Atlanta, GA',
           'Detroit, MI'=>'Detroit, MI', 'Durham, NC'=>'Durham, NC',
           'Cincinnati, OH'=>'Cincinnati, OH', 'Austin-TX'=>'Austin-TX',
           'Seattle, WA'=>'Seattle, WA', 'Non-US'=>'Non-US',
           'OrangeCounty, CA'=>'OrangeCounty, CA', 'Denver, CO'=>'Denver, CO',
           'Chicago, IL'=>'Chicago, IL', 'Minneapolis, MN'=>'Minneapolis, MN',
           'Northern, NJ'=>'Northern, NJ', 'Cleveland, OH'=>'Cleveland, OH',
           'Dallas, TX'=>'Dallas, TX', 'Milwaukee, WI'=>'Milwaukee, WI', 
           'Other-SeeNote'=>'Other-SeeNote'           
          //required=true does not work for multiple checkbox           
           )));            
           echo $this->Form->input('ExamLocationNote',array('disabled' => 'true'));
           echo $this->Form->input('Note');          
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>  
    <?= $this->Form->unlockField('ExamLocationNote'); ?>  
    <?= $this->Form->end() ?>
</div>
     





