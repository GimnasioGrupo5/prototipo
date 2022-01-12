<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Actividade Entity
 *
 * @property int $id_registro
 * @property string $nombre
 * @property \Cake\I18n\FrozenDate $fecha
 * @property int $nota_evaluacion
 * @property string $comentario
 * @property bool $reserva
 * @property bool $asistencia
 * @property int $id_sala
 * @property int $id_actividad
 * @property int $id_socio
 * @property int $id_monitor
 */
class Actividade extends Entity
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
        'nombre' => true,
        'fecha' => true,
        'nota_evaluacion' => true,
        'comentario' => true,
        'reserva' => true,
        'asistencia' => true,
        'id_sala' => true,
        'id_actividad' => true,
        'id_socio' => true,
        'id_monitor' => true,
    ];
}
