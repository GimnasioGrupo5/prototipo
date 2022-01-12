<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Monitore[]|\Cake\Collection\CollectionInterface $monitores
 */

?>

<div class="monitores index content">
    <h3><?= __('Monitores') ?></h3>
    <div class="table-responsive">
    
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('telefono') ?></th>
                    <th><?= $this->Paginator->sort('fecha_nacimiento') ?></th>
                    <th><?= $this->Paginator->sort('usuario') ?></th>
                    <th><?= $this->Paginator->sort('turno') ?></th>
                    <th><?= $this->Paginator->sort('actividad_especialista') ?></th>
                    <th class="actions"><?= __('Acciones') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($monitores as $monitore): ?>
                <tr>
                    <td><?= h($monitore->nombre) ?></td>
                    <td><?= h($monitore->telefono) ?></td>
                    <td><?= $this->Time->format($monitore->fecha_nacimiento, "dd-MM-YYYY") ?></td>
                    <td><?= h($monitore->usuario) ?></td>
                    <?php if($monitore->turno === 1){
                        $turno = "Mañana";
                    }else{
                        $turno = "Tarde";
                    }
                    ?>
                    <td><?= h($turno) ?></td>
                    <td><?= h($lista_actividades[$monitore->actividad_especialista]) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $monitore->id_monitor]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $monitore->id_monitor]) ?>
                        <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $monitore->id_monitor], ['confirm' => __('Are you sure you want to delete # {0}?', $monitore->id_monitor)]) ?>
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
