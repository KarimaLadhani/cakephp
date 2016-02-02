<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CepT Entity.
 */
class CepT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Cep_ID' => true,
        'Student_ID' => true,
        'Up_To_Date' => true,
        'Active' => true,
        'Date_Received' => true,
        'Due_Date' => true,
        'Note' => true,
        'Display_First_Name' => true,
        'Display_Last_Name' => true,
    ];
}
