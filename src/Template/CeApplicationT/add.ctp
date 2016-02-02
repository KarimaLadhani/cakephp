<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Ce Application T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="ceApplicationT form large-10 medium-9 columns">
    <?= $this->Form->create($ceApplicationT); ?>
    <fieldset>
        <legend><?= __('Add Ce Application T') ?></legend>
        <?php
            echo $this->Form->input('Cep_ID');
            echo $this->Form->input('Application_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Payment_Type');
            echo $this->Form->input('Payer_Name');
            echo $this->Form->input('Check_Number');
            echo $this->Form->input('Check_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Check_Name');
            echo $this->Form->input('Verisign_Transaction_Number');
            echo $this->Form->input('Verisign_Address_Line1');
            echo $this->Form->input('Verisign_Address_Line2');
            echo $this->Form->input('Payment_Execution_Date_Time', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Amount_Charged');
            echo $this->Form->input('Amount_Paid');
            echo $this->Form->input('Approval_Flag');
            echo $this->Form->input('Approval_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('New_Due_Date');
            echo $this->Form->input('Extension');
            echo $this->Form->input('Date_Recertified', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Application_Already_Submitted');
            echo $this->Form->input('Times_Submitted');
            echo $this->Form->input('Resubmission_Flag');
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
