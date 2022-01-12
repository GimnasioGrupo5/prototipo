<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Calendarioactividade Entity
 *
 * @property int $id_registro
 * @property int|null $id_actividad
 * @property int $id_sala
 * @property int $id_monitor
 * @property \Cake\I18n\FrozenDate|null $fecha
 * @property string $horario
 * @property int|null $ocupacion
 */
class Calendarioactividade extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'id_actividad' => true,
        'id_sala' => true,
        'id_monitor' => true,
        'fecha' => true,
        'horario' => true,
        'ocupacion' => true,
    ];
}
