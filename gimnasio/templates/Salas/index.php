<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sala[]|\Cake\Collection\CollectionInterface $salas
 */
?>
<div class="salas index content">
    <?= $this->Html->link(__('New Sala'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Salas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_sala') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('aforo') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salas as $sala): ?>
                <tr>
                    <td><?= $this->Number->format($sala->id_sala) ?></td>
                    <td><?= h($sala->nombre) ?></td>
                    <td><?= $this->Number->format($sala->aforo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sala->id_sala]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sala->id_sala]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sala->id_sala], ['confirm' => __('Are you sure you want to delete # {0}?', $sala->id_sala)]) ?>
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
