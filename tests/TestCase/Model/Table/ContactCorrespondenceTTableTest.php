<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ContactCorrespondenceTTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ContactCorrespondenceTTable Test Case
 */
class ContactCorrespondenceTTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.contact_correspondence_t'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ContactCorrespondenceT') ? [] : ['className' => 'App\Model\Table\ContactCorrespondenceTTable'];
        $this->ContactCorrespondenceT = TableRegistry::get('ContactCorrespondenceT', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ContactCorrespondenceT);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
