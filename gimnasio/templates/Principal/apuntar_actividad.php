<?php
declare(strict_types=1);
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actividade $actividade
 */
?>
<div class="column-responsive column-80">
    <div class="actividades form content">
        <?= $this->Form->create($actividade) ?>
        <h3>Resumen de la actividad</h3>
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Nombre actividad') ?></th>
                    <th><?= $this->Paginator->sort('Fecha') ?></th>
                    <th><?= $this->Paginator->sort('Horario') ?></th>
                    <th><?= $this->Paginator->sort('Sala') ?></th>
                    <th><?= $this->Paginator->sort('Monitor') ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $registro_actividad['nombre']; ?></td>
                    <td><?php echo $registro_actividad['fecha']; ?></td>
                    <td><?php echo $actividad['horario']; ?></td>
                    <td><?php echo $sala['nombre']; ?></td>
                    <td><?php echo $monitor['nombre']; ?></td>                    
                </tr>
            </tbody>        
        </table>
        <br/><br/>
        <label>IMPORTANTE: Confirmando la inscripción reservaras una plaza en la actividad.</label>
        <br/><br/>
        <div style="visibility: hidden; position: absolute;">
        <fieldset>
            <?php
                echo $this->Form->control('nombre', ['value' => $registro_actividad['nombre']]);
                echo $this->Form->control('fecha', ['value' => $registro_actividad['fecha']]);
                echo $this->Form->control('nota_evaluacion', ['value' => -1]);
                echo $this->Form->control('comentario', ['value' => ' ']);
                echo $this->Form->control('reserva', ['value' => 1]);
                echo $this->Form->control('asistencia', ['value' => 0]);
                echo $this->Form->control('id_sala', ['value' => $registro_actividad['id_sala']]);
                echo $this->Form->control('id_actividad', ['value' => $registro_actividad['id_actividad']]);
                echo $this->Form->control('id_socio', ['value' => $registro_actividad['id_socio']]);
                echo $this->Form->control('id_monitor', ['value' => $registro_actividad['id_monitor']]);
            ?>
        </fieldset>
        </div>
        <?= $this->Form->button(__('Confirmar')) ?>
        <?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'actividadesSocio'], ['class' => 'button float-right']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
