<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CeActivityListT Entity.
 */
class CeActivityListT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Course_Date' => true,
        'Provider_Name' => true,
        'Course_Title' => true,
        'Discipline' => true,
        'Others' => true,
        'Number_of_Credit_Hours' => true,
        'Note' => true,
        'Is_Active' => true,
        'Event' => true,
    ];
}
