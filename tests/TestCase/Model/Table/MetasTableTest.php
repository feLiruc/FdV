<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MetasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MetasTable Test Case
 */
class MetasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MetasTable
     */
    public $Metas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.metas',
        'app.canais',
        'app.culturas',
        'app.familias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Metas') ? [] : ['className' => MetasTable::class];
        $this->Metas = TableRegistry::getTableLocator()->get('Metas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Metas);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
