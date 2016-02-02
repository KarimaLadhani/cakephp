<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VolunteerKnowledgeTTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VolunteerKnowledgeTTable Test Case
 */
class VolunteerKnowledgeTTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.volunteer_knowledge_t'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VolunteerKnowledgeT') ? [] : ['className' => 'App\Model\Table\VolunteerKnowledgeTTable'];
        $this->VolunteerKnowledgeT = TableRegistry::get('VolunteerKnowledgeT', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VolunteerKnowledgeT);

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
