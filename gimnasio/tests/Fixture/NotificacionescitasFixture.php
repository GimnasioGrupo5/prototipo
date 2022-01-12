<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NotificacionescitasFixture
 */
class NotificacionescitasFixture extends TestFixture
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
                'id_notificacion' => 1,
                'id_entrenador' => 'Lorem ipsum dolor sit amet',
                'id_actividad' => 1,
                'notificacion' => 'Lorem ipsum dolor sit amet',
                'leida' => 1,
            ],
        ];
        parent::init();
    }
}
