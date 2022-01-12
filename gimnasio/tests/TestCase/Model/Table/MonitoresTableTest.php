<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MonitoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MonitoresTable Test Case
 */
class MonitoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MonitoresTable
     */
    protected $Monitores;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Monitores',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Monitores') ? [] : ['className' => MonitoresTable::class];
        $this->Monitores = $this->getTableLocator()->get('Monitores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Monitores);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MonitoresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
