<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Ce Activity List T'), ['action' => 'edit', $ceActivityListT->Ce_Activity_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ce Activity List T'), ['action' => 'delete', $ceActivityListT->Ce_Activity_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $ceActivityListT->Ce_Activity_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Ce Activity List T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ce Activity List T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="ceActivityListT view large-10 medium-9 columns">
    <h2><?= h($ceActivityListT->Ce_Activity_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Provider Name') ?></h6>
            <p><?= h($ceActivityListT->Provider_Name) ?></p>
            <h6 class="subheader"><?= __('Course Title') ?></h6>
            <p><?= h($ceActivityListT->Course_Title) ?></p>
            <h6 class="subheader"><?= __('Discipline') ?></h6>
            <p><?= h($ceActivityListT->Discipline) ?></p>
            <h6 class="subheader"><?= __('Others') ?></h6>
            <p><?= h($ceActivityListT->Others) ?></p>
            <h6 class="subheader"><?= __('Is Active') ?></h6>
            <p><?= h($ceActivityListT->Is_Active) ?></p>
            <h6 class="subheader"><?= __('Event') ?></h6>
            <p><?= h($ceActivityListT->Event) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Ce Activity ID') ?></h6>
            <p><?= $this->Number->format($ceActivityListT->Ce_Activity_ID) ?></p>
            <h6 class="subheader"><?= __('Number Of Credit Hours') ?></h6>
            <p><?= $this->Number->format($ceActivityListT->Number_of_Credit_Hours) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Course Date') ?></h6>
            <p><?= h($ceActivityListT->Course_Date) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($ceActivityListT->Note)); ?>

        </div>
    </div>
</div>
