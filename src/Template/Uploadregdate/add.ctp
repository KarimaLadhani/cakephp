<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Uploadregdate'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="uploadregdate form large-10 medium-9 columns">
    <?= $this->Form->create($uploadregdate); ?>
    <fieldset>
        <legend><?= __('Add Uploadregdate') ?></legend>
        <?php
            echo $this->Form->input('Student_ID');
            echo $this->Form->input('Exam_ID');
            echo $this->Form->input('Outcome');
            echo $this->Form->input('Date_Materials_Sent', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Retest');
            echo $this->Form->input('Payer_Name');
            echo $this->Form->input('Payment_Type');
            echo $this->Form->input('Check_Number');
            echo $this->Form->input('Check_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Check_Name');
            echo $this->Form->input('Verisign_Transaction_Number');
            echo $this->Form->input('Verisign_Address_Line1');
            echo $this->Form->input('Verisign_Address_Line2');
            echo $this->Form->input('Payment_Code_ID');
            echo $this->Form->input('Payment_Execution_Date_Time');
            echo $this->Form->input('Amount_Charged');
            echo $this->Form->input('Amount_Paid');
            echo $this->Form->input('Disability_Accomodations');
            echo $this->Form->input('Alternate_Test_Site_Requirement');
            echo $this->Form->input('Location');
            echo $this->Form->input('Registration_Complete_Flag');
            echo $this->Form->input('Mail_Confirmation');
            echo $this->Form->input('Status');
            echo $this->Form->input('Date_Passed', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Raw_Passing_Score');
            echo $this->Form->input('Required_Non_Saturday_Admission');
            echo $this->Form->input('Release_Contact_Info_To_Others');
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
