<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VolunteerKnowledgeTFixture
 *
 */
class VolunteerKnowledgeTFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'volunteer_knowledge_t';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Volunteer_Knowledge_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Volunteer_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Knowledge_Area' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Knowledge_Level' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Volunteer_Application_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Note' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'Volunteer_ID_Index' => ['type' => 'index', 'columns' => ['Volunteer_ID'], 'length' => []],
            'Volunteer_Application_ID_Index' => ['type' => 'index', 'columns' => ['Volunteer_Application_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Volunteer_Knowledge_ID'], 'length' => []],
            'Volunteer_Knowledge_fk1' => ['type' => 'foreign', 'columns' => ['Volunteer_ID'], 'references' => ['volunteer_t', 'Volunteer_ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Volunteer_Knowledge_fk2' => ['type' => 'foreign', 'columns' => ['Volunteer_Application_ID'], 'references' => ['volunteer_application_t', 'Volunteer_Application_ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'Volunteer_Knowledge_ID' => 1,
            'Volunteer_ID' => 1,
            'Knowledge_Area' => 'Lorem ipsum dolor sit amet',
            'Knowledge_Level' => 'Lorem ipsum dolor sit amet',
            'Volunteer_Application_ID' => 1,
            'Note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}
