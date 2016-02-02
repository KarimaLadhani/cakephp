<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CeActivityT Entity.
 */
class CeActivityT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Ce_Application_ID' => true,
        'Cep_ID' => true,
        'Course_Date' => true,
        'Provider_Name' => true,
        'Course_Title' => true,
        'Discipline' => true,
        'Others' => true,
        'Number_of_Credit_Hours' => true,
        'Note' => true,
        'Pre_Approved' => true,
    ];
}
