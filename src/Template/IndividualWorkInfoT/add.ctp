<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Individual Work Info T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="individualWorkInfoT form large-10 medium-9 columns">
    <?= $this->Form->create($individualWorkInfoT); ?>
    <fieldset>
        <legend><?= __('Add Individual Work Info T') ?></legend>
        <?php
            echo $this->Form->input('Individual_ID');
            echo $this->Form->input('Level');
            echo $this->Form->input('Work_Address1');
            echo $this->Form->input('Work_Address2');
            echo $this->Form->input('Work_City');
            echo $this->Form->input('Work_State');
            echo $this->Form->input('Work_Postal_Code');
            echo $this->Form->input('Work_Country');
            echo $this->Form->input('Work_Phone');
            echo $this->Form->input('Work_Extension');
            echo $this->Form->input('Work_Fax_Number');
            echo $this->Form->input('Individual_Title');
            echo $this->Form->input('Individual_Department');
            echo $this->Form->input('Individual_Company');
            echo $this->Form->input('Company_Type');
            echo $this->Form->input('Is_Current');
            echo $this->Form->input('Work_Start', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Work_End', array('empty' => true, 'default' => ''));
            echo $this->Form->input('Work_Responsibilities');
            echo $this->Form->input('Note');
            echo $this->Form->input('Last_Update');
            echo $this->Form->input('Release_Consent_Form');
            echo $this->Form->input('Consent_Date', array('empty' => true, 'default' => ''));
            echo $this->Form->input('PIndividual_Company');
            echo $this->Form->input('PIndividual_Title');
            echo $this->Form->input('PWork_Start', array('empty' => true, 'default' => ''));
            echo $this->Form->input('PWork_End', array('empty' => true, 'default' => ''));
            echo $this->Form->input('PWork_City');
            echo $this->Form->input('PState');
            echo $this->Form->input('PWork_Responsibilities');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
