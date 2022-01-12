<?php
declare(strict_types=1);
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actividade $actividade
 */

?>
<div class="column-responsive column-80">
    <div class="actividades form content">
        <?= $this->Form->create($actividad, ['url' => ['action' => 'guardarNota']]) ?>
        <h3>Valorar monitor</h3>
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Nombre actividad') ?></th>
                    <th><?= $this->Paginator->sort('Fecha') ?></th>
                    <th><?= $this->Paginator->sort('Horario') ?></th>
                    <th><?= $this->Paginator->sort('Monitor') ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= h($lista_tipos[$actividad->id_actividad]) ?></td>
                    <td><?= $this->Time->format($fecha[$actividad->id_actividad], "dd-MM-YYYY") ?></td>
                    <td><?= h($horario[$actividad->id_actividad]) ?></td>                   
                    <td><?= h($lista_monitores[$actividad->id_monitor]) ?></td>                
                </tr>
            </tbody>        
        </table>
        <label>Value con una nota del 1 al 10 al monitor de la actividad y un breve comentario.</label>
        <?php echo $this->Form->control('nota', ['type' => 'number', 'min' => '1', 'max' => '10']);?>
        <?php echo $this->Form->control('comentario');?>
        <div style="visibility: hidden; position: absolute">
            <?php echo $this->Form->control('id_actividad', ['value' => $actividad->id_actividad]);?>
        </div>
        <br/><br/>
        <?= $this->Form->button(__('Confirmar')) ?>
        <?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'resumenSemanal'], ['class' => 'button float-right']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
