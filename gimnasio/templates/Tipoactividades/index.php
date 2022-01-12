<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tipoactividade[]|\Cake\Collection\CollectionInterface $tipoactividades
 */
?>
<div class="tipoactividades index content">
    <?= $this->Html->link(__('Nueva actividad'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Actividades') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_actividad') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('tipo') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tipoactividades as $tipoactividade): ?>
                <tr>
                    <td><?= $this->Number->format($tipoactividade->id_actividad) ?></td>
                    <td><?= h($tipoactividade->nombre) ?></td>
                    <td><?= h($tipoactividade->tipo) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $tipoactividade->id_actividad]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tipoactividade->id_actividad]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $tipoactividade->id_actividad], ['confirm' => __('Are you sure you want to delete # {0}?', $tipoactividade->id_actividad)]) ?>
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
    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'gestionActividades'], ['class' => 'button float-right']) ?><br/><br/>

</div>
