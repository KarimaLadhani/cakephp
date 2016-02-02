<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Testindividual'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="testindividual form large-10 medium-9 columns">
    <?= $this->Form->create($testindividual); ?>
    <fieldset>
        <legend><?= __('Add Testindividual') ?></legend>
        <?php
            echo $this->Form->input('First_Name');
            echo $this->Form->input('Middle_Initial');
            echo $this->Form->input('Last_Name');
            echo $this->Form->input('Address1');
            echo $this->Form->input('Address2');
            echo $this->Form->input('City');
            echo $this->Form->input('State');
            echo $this->Form->input('Postal_Code');
            echo $this->Form->input('Country');
            echo $this->Form->input('Home_Phone');
            echo $this->Form->input('Mobile_Phone');
            echo $this->Form->input('Email_Address');
            echo $this->Form->input('Alternate_Email_Address');
            echo $this->Form->input('Password');
            echo $this->Form->input('Preferred_Address');
            echo $this->Form->input('Do_Not_Mail');
            echo $this->Form->input('Is_Student');
            echo $this->Form->input('Is_Volunteer');
            echo $this->Form->input('Is_Contact');
            echo $this->Form->input('Note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
