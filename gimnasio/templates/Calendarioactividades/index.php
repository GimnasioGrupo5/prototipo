<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Calendarioactividade[]|\Cake\Collection\CollectionInterface $calendarioactividades
 */
?>
<div class="calendarioactividades index content">
    <?= $this->Html->link(__('Programar actividad'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Calendario de actividades') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id_actividad') ?></th>
                    <th><?= $this->Paginator->sort('id_sala') ?></th>
                    <th><?= $this->Paginator->sort('id_monitor') ?></th>
                    <th><?= $this->Paginator->sort('fecha') ?></th>
                    <th><?= $this->Paginator->sort('horario') ?></th>
                    <th><?= $this->Paginator->sort('ocupacion') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($calendarioactividades as $calendarioactividade): ?>
                <tr>
                    <td><?= h($lista_actividades[$calendarioactividade->id_actividad]) ?></td>
                    <td><?= h($lista_salas[$calendarioactividade->id_sala]) ?></td>
                    <td><?= h($lista_monitores[$calendarioactividade->id_monitor]) ?></td>
                    <td><?= h($calendarioactividade->fecha) ?></td>
                    <td><?= h($calendarioactividade->horario) ?></td>
                    <td><?= $this->Number->format($calendarioactividade->ocupacion) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $calendarioactividade->id_registro]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $calendarioactividade->id_registro]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $calendarioactividade->id_registro], ['confirm' => __('Are you sure you want to delete # {0}?', $calendarioactividade->id_registro)]) ?>
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
