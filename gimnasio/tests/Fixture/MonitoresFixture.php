<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MonitoresFixture
 */
class MonitoresFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_monitor' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'salario' => 1.5,
                'telefono' => 1,
                'fecha_nacimiento' => '2021-12-29',
                'id_rol' => 1,
                'usuario' => 'Lorem ipsum dolor sit amet',
                'turno' => 1,
                'actividad_especialista' => 1,
            ],
        ];
        parent::init();
    }
}
