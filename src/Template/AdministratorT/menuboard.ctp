<div class="actions columns large-2 medium-3">
    <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">	        
        <li><?= $this->Html->link(__('Create Exam'), ['controller'=>'ExaminationT','action' => 'createexam']) ?></li>
        <li><?= $this->Html->link(__('Display Exams'), ['controller'=>'ExaminationT','action' => 'displayexam']) ?></li>
        <li><?= $this->Html->link(__('Display CeApp'), ['controller'=>'CeApplicationT','action' => 'displayceapp']) ?><li>
        <li><?= $this->Html->link(__('Logout'), ['controller'=>'AdministratorT','action' => 'logout']) ?></li>                    
    </ul>
</div>