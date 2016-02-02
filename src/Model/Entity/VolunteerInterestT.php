<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VolunteerInterestT Entity.
 */
class VolunteerInterestT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Volunteer_ID' => true,
        'Interest_Type' => true,
        'Note' => true,
    ];
}
