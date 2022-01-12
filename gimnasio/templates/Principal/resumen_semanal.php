<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepcionista[]|\Cake\Collection\CollectionInterface $recepcionistas
 */

?>
<div class="recepcionistas index content">
    <h3><?= __('Actividades registradas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('sala') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('horario') ?></th>
                    <th><?= $this->Paginator->sort('monitor') ?></th>
                    <th><?= $this->Paginator->sort('asistencia') ?></th>
                    <th><?= $this->Paginator->sort('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actividades as $act): ?>
                <tr>
                    <td><?= h($act['nombre']) ?></td>
                    <td><?= h($lista_salas[$act['id_sala']]) ?></td>
                    <td><?= h($act['fecha']) ?></td>
                    <td><?= h($lista_horarios[$act['id_actividad']]) ?></td>
                    <td><?= h($lista_monitores[$act['id_monitor']]) ?></td>
                    <?php 
                        if($this->Number->format($act['asistencia']) == 0)
                        {
                           ?>
                            <td><?= h('No') ?></td>
                           <?php 
                        }else{
                            ?>
                            <td><?= h('Si') ?></td>
                           <?php 
                        }
                    ?>
                    <td>
                        <?= $this->Html->link(__('Valorar monitor'), ['action' => 'valorarMonitor', $act->id_registro], ['class' => 'button']) ?>
                        <?= $this->Html->link(__('Pulsera'), ['action' => 'registrarPulsera', $act->id_registro], ['class' => 'button']) ?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>    
    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'index'], ['class' => 'button float-right']) ?><br/><br/>
</div>