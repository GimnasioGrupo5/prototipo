<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Citasentrenador[]|\Cake\Collection\CollectionInterface $citasentrenador
 */
?>
<div class="citasentrenador index content">
    <?= $this->Html->link(__('New Citasentrenador'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Citasentrenador') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_registro') ?></th>
                    <th><?= $this->Paginator->sort('id_socio') ?></th>
                    <th><?= $this->Paginator->sort('id_entrenador') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('hora') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($citasentrenador as $citasentrenador): ?>
                <tr>
                    <td><?= $this->Number->format($citasentrenador->id_registro) ?></td>
                    <td><?= $this->Number->format($citasentrenador->id_socio) ?></td>
                    <td><?= $this->Number->format($citasentrenador->id_entrenador) ?></td>
                    <td><?= h($citasentrenador->fecha) ?></td>
                    <td><?= h($citasentrenador->hora) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $citasentrenador->id_registro]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $citasentrenador->id_registro]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $citasentrenador->id_registro], ['confirm' => __('Are you sure you want to delete # {0}?', $citasentrenador->id_registro)]) ?>
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
