<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Directore[]|\Cake\Collection\CollectionInterface $directores
 */
?>
<div class="directores index content">
    <h3><?= __('Directores') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('salario') ?></th>
                    <th><?= $this->Paginator->sort('telefono') ?></th>
                    <th><?= $this->Paginator->sort('fecha_nacimiento') ?></th>
                    <th><?= $this->Paginator->sort('usuario') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($directores as $directore): ?>
                <tr>
                    <td><?= h($directore->nombre) ?></td>
                    <td><?= $this->Number->format($directore->salario). "€" ?></td>
                    <td><?= h($directore->telefono) ?></td>
                    <td><?= $this->Time->format($directore->fecha_nacimiento, "dd-MM-YYYY") ?></td>
                    <td><?= h($directore->usuario) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $directore->id_director]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $directore->id_director]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $directore->id_director], ['confirm' => __('Are you sure you want to delete # {0}?', $directore->id_director)]) ?>
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
