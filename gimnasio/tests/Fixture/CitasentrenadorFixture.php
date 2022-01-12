<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CitasentrenadorFixture
 */
class CitasentrenadorFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'citasentrenador';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_registro' => 1,
                'id_socio' => 1,
                'id_entrenador' => 1,
                'fecha' => '2022-01-04',
                'hora' => '13:32:19',
            ],
        ];
        parent::init();
    }
}
