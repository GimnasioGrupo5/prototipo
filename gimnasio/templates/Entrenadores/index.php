<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entrenadore[]|\Cake\Collection\CollectionInterface $entrenadores
 */
?>
<div class="entrenadores index content">
    <h3><?= __('Entrenadores') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('telefono') ?></th>
                    <th><?= $this->Paginator->sort('fecha_nacimiento') ?></th>
                    <th><?= $this->Paginator->sort('usuario') ?></th>
                    <th><?= $this->Paginator->sort('libres') ?></th>
                    <th><?= $this->Paginator->sort('Reservadas') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($entrenadores as $entrenadore): ?>
                <tr>
                    <td><?= h($entrenadore->nombre) ?></td>
                    <td><?= h($entrenadore->telefono) ?></td>
                    <td><?= $this->Time->format($entrenadore->fecha_nacimiento, "dd-MM-YYYY") ?></td>
                    <td><?= h($entrenadore->usuario) ?></td>
                    <td><?= h($entrenadore->horas_libres) ?></td>
                    <td><?= h($entrenadore->horas_reservadas) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $entrenadore->id_entrenador]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $entrenadore->id_entrenador]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $entrenadore->id_entrenador], ['confirm' => __('Are you sure you want to delete # {0}?', $entrenadore->id_entrenador)]) ?>
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
    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'gestionUsuarios'], ['class' => 'button float-right']) ?><br/><br/>
</div>
