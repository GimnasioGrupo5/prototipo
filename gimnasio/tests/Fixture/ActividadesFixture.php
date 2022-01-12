<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActividadesFixture
 */
class ActividadesFixture extends TestFixture
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
                'id_registro' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'fecha' => '2022-01-03',
                'nota_evaluacion' => 1,
                'comentario' => 'Lorem ipsum dolor sit amet',
                'reserva' => 1,
                'asistencia' => 1,
                'id_sala' => 1,
                'id_actividad' => 1,
                'id_socio' => 1,
                'id_monitor' => 1,
            ],
        ];
        parent::init();
    }
}
