<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Testindividual'), ['action' => 'edit', $testindividual->Individual_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Testindividual'), ['action' => 'delete', $testindividual->Individual_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $testindividual->Individual_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Testindividual'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Testindividual'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="testindividual view large-10 medium-9 columns">
    <h2><?= h($testindividual->Individual_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('First Name') ?></h6>
            <p><?= h($testindividual->First_Name) ?></p>
            <h6 class="subheader"><?= __('Middle Initial') ?></h6>
            <p><?= h($testindividual->Middle_Initial) ?></p>
            <h6 class="subheader"><?= __('Last Name') ?></h6>
            <p><?= h($testindividual->Last_Name) ?></p>
            <h6 class="subheader"><?= __('Address1') ?></h6>
            <p><?= h($testindividual->Address1) ?></p>
            <h6 class="subheader"><?= __('Address2') ?></h6>
            <p><?= h($testindividual->Address2) ?></p>
            <h6 class="subheader"><?= __('City') ?></h6>
            <p><?= h($testindividual->City) ?></p>
            <h6 class="subheader"><?= __('State') ?></h6>
            <p><?= h($testindividual->State) ?></p>
            <h6 class="subheader"><?= __('Postal Code') ?></h6>
            <p><?= h($testindividual->Postal_Code) ?></p>
            <h6 class="subheader"><?= __('Country') ?></h6>
            <p><?= h($testindividual->Country) ?></p>
            <h6 class="subheader"><?= __('Home Phone') ?></h6>
            <p><?= h($testindividual->Home_Phone) ?></p>
            <h6 class="subheader"><?= __('Mobile Phone') ?></h6>
            <p><?= h($testindividual->Mobile_Phone) ?></p>
            <h6 class="subheader"><?= __('Email Address') ?></h6>
            <p><?= h($testindividual->Email_Address) ?></p>
            <h6 class="subheader"><?= __('Alternate Email Address') ?></h6>
            <p><?= h($testindividual->Alternate_Email_Address) ?></p>
            <h6 class="subheader"><?= __('Password') ?></h6>
            <p><?= h($testindividual->Password) ?></p>
            <h6 class="subheader"><?= __('Preferred Address') ?></h6>
            <p><?= h($testindividual->Preferred_Address) ?></p>
            <h6 class="subheader"><?= __('Do Not Mail') ?></h6>
            <p><?= h($testindividual->Do_Not_Mail) ?></p>
            <h6 class="subheader"><?= __('Is Student') ?></h6>
            <p><?= h($testindividual->Is_Student) ?></p>
            <h6 class="subheader"><?= __('Is Volunteer') ?></h6>
            <p><?= h($testindividual->Is_Volunteer) ?></p>
            <h6 class="subheader"><?= __('Is Contact') ?></h6>
            <p><?= h($testindividual->Is_Contact) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Individual ID') ?></h6>
            <p><?= $this->Number->format($testindividual->Individual_ID) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($testindividual->Note)); ?>

        </div>
    </div>
</div>
