<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $administratorT->Admin_ID],
                ['confirm' => __('Are you sure you want to delete # {0}?', $administratorT->Admin_ID)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Administrator T'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="administratorT form large-10 medium-9 columns">
    <?= $this->Form->create($administratorT); ?>
    <fieldset>
        <legend><?= __('Edit Administrator T') ?></legend>
        <?php
            echo $this->Form->input('First_Name');
            echo $this->Form->input('Last_Name');
            echo $this->Form->input('Admin_Username');
            echo $this->Form->input('Admin_Password');
            echo $this->Form->input('Phone_Number');
            echo $this->Form->input('Email_Address');
            echo $this->Form->input('Time_Stamp');
            echo $this->Form->input('Note');
            echo $this->Form->input('Privileges');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
