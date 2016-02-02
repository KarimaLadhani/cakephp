<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VolunteerActivityTFixture
 *
 */
class VolunteerActivityTFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'volunteer_activity_t';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Volunteer_Activity_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Volunteer_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Volunteer_Activity_List_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'CE_Application_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'Volunteer_Activity_fk1' => ['type' => 'index', 'columns' => ['Volunteer_ID'], 'length' => []],
            'Volunteer_Activity_fk2' => ['type' => 'index', 'columns' => ['Volunteer_Activity_List_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Volunteer_Activity_ID'], 'length' => []],
            'Volunteer_Activity_fk1' => ['type' => 'foreign', 'columns' => ['Volunteer_ID'], 'references' => ['volunteer_t', 'Volunteer_ID'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'Volunteer_Activity_fk2' => ['type' => 'foreign', 'columns' => ['Volunteer_Activity_List_ID'], 'references' => ['volunteer_activity_list_t', 'Volunteer_Activity_List_ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'Volunteer_Activity_ID' => 1,
            'Volunteer_ID' => 1,
            'Volunteer_Activity_List_ID' => 1,
            'CE_Application_ID' => 1
        ],
    ];
}
