<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepcionista[]|\Cake\Collection\CollectionInterface $recepcionistas
 */

?>
<div class="recepcionistas index content">
    <h3><?= __('Actividades de '.$monitor[0]['nombre']) ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_actividad') ?></th>
                    <th><?= $this->Paginator->sort('id_sala') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('horario') ?></th>
                    <th><?= $this->Paginator->sort('ocupacion') ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($actividades as $act): ?>
                <tr>
                    <td><?= h($lista_actividades[$act->id_actividad]) ?></td>
                    <td><?= h($lista_salas[$act->id_sala]) ?></td>
                    <td><?= $this->Time->format($act->fecha, "dd-MM-YYYY") ?></td>
                    <td><?= h($act->horario) ?></td>
                    <td><?= $this->Number->format($act->ocupacion) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'index'], ['class' => 'button float-right']) ?><br/><br/>
</div>