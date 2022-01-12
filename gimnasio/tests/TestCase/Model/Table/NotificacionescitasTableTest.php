<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NotificacionescitasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NotificacionescitasTable Test Case
 */
class NotificacionescitasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NotificacionescitasTable
     */
    protected $Notificacionescitas;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Notificacionescitas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Notificacionescitas') ? [] : ['className' => NotificacionescitasTable::class];
        $this->Notificacionescitas = $this->getTableLocator()->get('Notificacionescitas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Notificacionescitas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\NotificacionescitasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
