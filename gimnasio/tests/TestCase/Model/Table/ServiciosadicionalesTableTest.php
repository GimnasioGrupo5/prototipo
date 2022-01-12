<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServiciosadicionalesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServiciosadicionalesTable Test Case
 */
class ServiciosadicionalesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ServiciosadicionalesTable
     */
    protected $Serviciosadicionales;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Serviciosadicionales',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Serviciosadicionales') ? [] : ['className' => ServiciosadicionalesTable::class];
        $this->Serviciosadicionales = $this->getTableLocator()->get('Serviciosadicionales', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Serviciosadicionales);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ServiciosadicionalesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
