<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UploadregdateFixture
 *
 */
class UploadregdateFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'uploadregdate';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Registration_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Student_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Exam_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Outcome' => ['type' => 'string', 'length' => 30, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Date_Materials_Sent' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Retest' => ['type' => 'string', 'length' => 5, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Payer_Name' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Payment_Type' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Check_Number' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Check_Date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Check_Name' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Verisign_Transaction_Number' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Verisign_Address_Line1' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Verisign_Address_Line2' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Payment_Code_ID' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Payment_Execution_Date_Time' => ['type' => 'timestamp', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'Amount_Charged' => ['type' => 'decimal', 'length' => 19, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'Amount_Paid' => ['type' => 'decimal', 'length' => 19, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'Disability_Accomodations' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => 'No', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Alternate_Test_Site_Requirement' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Location' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Registration_Complete_Flag' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Mail_Confirmation' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Status' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'Date_Passed' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'Raw_Passing_Score' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Required_Non_Saturday_Admission' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => 'No', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Release_Contact_Info_To_Others' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => 'No', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Note' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'Registration_fk1' => ['type' => 'index', 'columns' => ['Student_ID'], 'length' => []],
            'Registration_fk2' => ['type' => 'index', 'columns' => ['Exam_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['Registration_ID'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'MyISAM',
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
            'Registration_ID' => 1,
            'Student_ID' => 1,
            'Exam_ID' => 1,
            'Outcome' => 'Lorem ipsum dolor sit amet',
            'Date_Materials_Sent' => '2015-12-01',
            'Retest' => 'Lor',
            'Payer_Name' => 'Lorem ipsum dolor sit amet',
            'Payment_Type' => 'Lorem ipsum dolor sit amet',
            'Check_Number' => 1,
            'Check_Date' => '2015-12-01',
            'Check_Name' => 'Lorem ipsum dolor sit amet',
            'Verisign_Transaction_Number' => 'Lorem ipsum dolor sit amet',
            'Verisign_Address_Line1' => 'Lorem ipsum dolor sit amet',
            'Verisign_Address_Line2' => 'Lorem ipsum dolor sit amet',
            'Payment_Code_ID' => 1,
            'Payment_Execution_Date_Time' => 1448930794,
            'Amount_Charged' => '',
            'Amount_Paid' => '',
            'Disability_Accomodations' => 'Lorem ip',
            'Alternate_Test_Site_Requirement' => 'Lorem ip',
            'Location' => 'Lorem ipsum dolor sit amet',
            'Registration_Complete_Flag' => 'Lorem ip',
            'Mail_Confirmation' => 'Lorem ip',
            'Status' => 'Lorem ipsum dolor sit amet',
            'Date_Passed' => '2015-12-01',
            'Raw_Passing_Score' => 1,
            'Required_Non_Saturday_Admission' => 'Lorem ip',
            'Release_Contact_Info_To_Others' => 'Lorem ip',
            'Note' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}
