<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VolunteerT Entity.
 */
class VolunteerT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Cep_ID' => true,
        'College1' => true,
        'Degree1' => true,
        'Major1' => true,
        'College2' => true,
        'Degree2' => true,
        'Major2' => true,
        'Volunteer_Interest' => true,
        'Sample_Item' => true,
        'Approval_Flag' => true,
        'Note' => true,
    ];
}
