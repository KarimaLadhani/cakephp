<div class="actions columns large-2 medium-3">
    <h5><?= __('The CEP Institute') ?></h5>
    <ul class="side-nav">           
        <li><?= $this->Html->link(__('Home'), ['controller'=>'AdministratorT','action' => 'menuboard']) ?></li>
        <li><?= $this->Html->link(__('Create Exam'), ['controller'=>'ExaminationT','action' => 'createexam']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller'=>'AdministratorT','action' => 'logout']) ?></li>               
    </ul>
</div>
<div class="examinationT view large-10 medium-9 columns">
      
    <div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Display Exams') ?></h4>    
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Exam ID') ?></th>
            <th><?= __('Exam Level') ?></th>
            <th><?= __('Exam Date') ?></th>
            <th><?= __('Enabled') ?></th>
            <th><?= __('Registration Deadline') ?></th>
            <th><?= __('Deferment Deadline') ?></th>
            <th><?= __('No. of Locations') ?></th>
            <th><?= __('No. of Candidates') ?></th>
            <th><?= __('Candidates Info') ?></th>            
        </tr>
        <?php 
        foreach ($results as $result): 
        $enabled='';
        if(empty($result->Enabled)){
        $enabled='Unknown';
        }else{
        $enabled=$result->Enabled;
        }
        echo "<tr>                  
            <!-- <td><a href='/register'>$result->Exam_ID </a></td> -->
            <td>$result->Exam_ID</td>
            <td>$result->Exam_Level</td>
            <td>".date('m/d/Y', strtotime($result->Exam_Date))."</td>
            <td>$enabled</td>
            <td>".date('m/d/Y', strtotime($result->Registration_Deadline))."</td>
            <td>".date('m/d/Y',strtotime($result->Deferment_Deadline))."</td>
            <td>".count($result->examLocationInfo)."</td>
            <td>".count($result->examRegistrationInfo)."</td>    
            
            <td> <a href='/admin/displayregisteredstudentsforexam/$result->Exam_ID'>Candidates</a> </td>  
    
        </tr>"
        ?>
        <?php endforeach; ?>
    </table>
 <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
    </div>
</div>
    
</div>
