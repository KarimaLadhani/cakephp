<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ContactSourceT Entity.
 */
class ContactSourceT extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'Contact_ID' => true,
        'Contact_Source_Where' => true,
        'Contact_Source_When' => true,
        'Note' => true,
    ];
}
