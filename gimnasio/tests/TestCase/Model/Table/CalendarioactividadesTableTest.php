<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CalendarioactividadesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CalendarioactividadesTable Test Case
 */
class CalendarioactividadesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CalendarioactividadesTable
     */
    protected $Calendarioactividades;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Calendarioactividades',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Calendarioactividades') ? [] : ['className' => CalendarioactividadesTable::class];
        $this->Calendarioactividades = $this->getTableLocator()->get('Calendarioactividades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Calendarioactividades);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CalendarioactividadesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
