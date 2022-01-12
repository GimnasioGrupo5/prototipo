<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Actividade[]|\Cake\Collection\CollectionInterface $actividades
 */
?>
<div class="actividades index content">
    <?= $this->Html->link(__('New Actividade'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Actividades') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_registro') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('nota_evaluacion') ?></th>
                    <th><?= $this->Paginator->sort('comentario') ?></th>
                    <th><?= $this->Paginator->sort('reserva') ?></th>
                    <th><?= $this->Paginator->sort('asistencia') ?></th>
                    <th><?= $this->Paginator->sort('id_sala') ?></th>
                    <th><?= $this->Paginator->sort('id_actividad') ?></th>
                    <th><?= $this->Paginator->sort('id_socio') ?></th>
                    <th><?= $this->Paginator->sort('id_monitor') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($actividades as $actividade): ?>
                <tr>
                    <td><?= $this->Number->format($actividade->id_registro) ?></td>
                    <td><?= h($actividade->nombre) ?></td>
                    <td><?= h($actividade->fecha) ?></td>
                    <td><?= $this->Number->format($actividade->nota_evaluacion) ?></td>
                    <td><?= h($actividade->comentario) ?></td>
                    <td><?= h($actividade->reserva) ?></td>
                    <td><?= h($actividade->asistencia) ?></td>
                    <td><?= $this->Number->format($actividade->id_sala) ?></td>
                    <td><?= $this->Number->format($actividade->id_actividad) ?></td>
                    <td><?= $this->Number->format($actividade->id_socio) ?></td>
                    <td><?= $this->Number->format($actividade->id_monitor) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $actividade->id_registro]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $actividade->id_registro]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $actividade->id_registro], ['confirm' => __('Are you sure you want to delete # {0}?', $actividade->id_registro)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
