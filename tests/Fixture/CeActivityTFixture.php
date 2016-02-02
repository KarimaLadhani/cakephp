<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CeActivityTFixture
 *
 */
class CeActivityTFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'ce_activity_t';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Ce_Activity_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Ce_Application_ID' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Cep_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Course_Date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Provider_Name' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Course_Title' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Discipline' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Others' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Number_of_Credit_Hours' => ['type' => 'decimal', 'length' => 19, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'Note' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Pre_Approved' => ['type' => 'string', 'length' => 4, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'Application_ID_Index' => ['type' => 'index', 'columns' => ['Ce_Application_ID'], 'length' => []],
            'Ce_Activity_fk1' => ['type' => 'index', 'columns' => ['Cep_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Ce_Activity_ID'], 'length' => []],
            'Ce_Activity_fk1' => ['type' => 'foreign', 'columns' => ['Cep_ID'], 'references' => ['cep_t', 'Cep_ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'Ce_Activity_fk2' => ['type' => 'foreign', 'columns' => ['Ce_Application_ID'], 'references' => ['ce_application_t', 'Ce_Application_ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'Ce_Activity_ID' => 1,
            'Ce_Application_ID' => 1,
            'Cep_ID' => 1,
            'Course_Date' => '2015-12-01',
            'Provider_Name' => 'Lorem ipsum dolor sit amet',
            'Course_Title' => 'Lorem ipsum dolor sit amet',
            'Discipline' => 'Lorem ipsum dolor sit amet',
            'Others' => 'Lorem ipsum dolor sit amet',
            'Number_of_Credit_Hours' => '',
            'Note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'Pre_Approved' => 'Lo'
        ],
    ];
}
