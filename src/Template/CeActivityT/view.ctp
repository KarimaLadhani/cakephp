<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Ce Activity T'), ['action' => 'edit', $ceActivityT->Ce_Activity_ID]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ce Activity T'), ['action' => 'delete', $ceActivityT->Ce_Activity_ID], ['confirm' => __('Are you sure you want to delete # {0}?', $ceActivityT->Ce_Activity_ID)]) ?> </li>
        <li><?= $this->Html->link(__('List Ce Activity T'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ce Activity T'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="ceActivityT view large-10 medium-9 columns">
    <h2><?= h($ceActivityT->Ce_Activity_ID) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Provider Name') ?></h6>
            <p><?= h($ceActivityT->Provider_Name) ?></p>
            <h6 class="subheader"><?= __('Course Title') ?></h6>
            <p><?= h($ceActivityT->Course_Title) ?></p>
            <h6 class="subheader"><?= __('Discipline') ?></h6>
            <p><?= h($ceActivityT->Discipline) ?></p>
            <h6 class="subheader"><?= __('Others') ?></h6>
            <p><?= h($ceActivityT->Others) ?></p>
            <h6 class="subheader"><?= __('Pre Approved') ?></h6>
            <p><?= h($ceActivityT->Pre_Approved) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Ce Activity ID') ?></h6>
            <p><?= $this->Number->format($ceActivityT->Ce_Activity_ID) ?></p>
            <h6 class="subheader"><?= __('Ce Application ID') ?></h6>
            <p><?= $this->Number->format($ceActivityT->Ce_Application_ID) ?></p>
            <h6 class="subheader"><?= __('Cep ID') ?></h6>
            <p><?= $this->Number->format($ceActivityT->Cep_ID) ?></p>
            <h6 class="subheader"><?= __('Number Of Credit Hours') ?></h6>
            <p><?= $this->Number->format($ceActivityT->Number_of_Credit_Hours) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Course Date') ?></h6>
            <p><?= h($ceActivityT->Course_Date) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Note') ?></h6>
            <?= $this->Text->autoParagraph(h($ceActivityT->Note)); ?>

        </div>
    </div>
</div>
