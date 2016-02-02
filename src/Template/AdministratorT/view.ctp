<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Administrator T'), ['action' => 'edit', $administratorT->Admin_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Administrator T'), ['action' => 'delete', $administratorT->Admin_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $administratorT->Admin_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Administrator T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Administrator T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="administratorT view large-10 medium-9 columns">
    <h2><?= h($administratorT->Admin_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('First Name') ?></h6>
            <p><?= h($administratorT->First_Name) ?></p>
            <h6 class="subheader"><?= __('Last Name') ?></h6>
            <p><?= h($administratorT->Last_Name) ?></p>
            <h6 class="subheader"><?= __('Admin Username') ?></h6>
            <p><?= h($administratorT->Admin_Username) ?></p>
            <h6 class="subheader"><?= __('Admin Password') ?></h6>
            <p><?= h($administratorT->Admin_Password) ?></p>
            <h6 class="subheader"><?= __('Phone Number') ?></h6>
            <p><?= h($administratorT->Phone_Number) ?></p>
            <h6 class="subheader"><?= __('Email Address') ?></h6>
            <p><?= h($administratorT->Email_Address) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Admin ID') ?></h6>
            <p><?= $this->Number->format($administratorT->Admin_ID) ?></p>
            <h6 class="subheader"><?= __('Privileges') ?></h6>
            <p><?= $this->Number->format($administratorT->Privileges) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Time Stamp') ?></h6>
            <p><?= h($administratorT->Time_Stamp) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($administratorT->Note)); ?>

        </div>
    </div>
</div>
