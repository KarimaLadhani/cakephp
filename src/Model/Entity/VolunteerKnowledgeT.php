<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VolunteerKnowledgeT Entity.
 */
class VolunteerKnowledgeT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Volunteer_ID' => true,
        'Knowledge_Area' => true,
        'Knowledge_Level' => true,
        'Volunteer_Application_ID' => true,
        'Note' => true,
    ];
}
