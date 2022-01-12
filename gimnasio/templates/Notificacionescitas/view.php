<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Notificacionescita $notificacionescita
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Notificacionescita'), ['action' => 'edit', $notificacionescita->id_notificacion], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Notificacionescita'), ['action' => 'delete', $notificacionescita->id_notificacion], ['confirm' => __('Are you sure you want to delete # {0}?', $notificacionescita->id_notificacion), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Notificacionescitas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Notificacionescita'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="notificacionescitas view content">
            <h3><?= h($notificacionescita->id_notificacion) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id Notificacion') ?></th>
                    <td><?= $this->Number->format($notificacionescita->id_notificacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Entrenador') ?></th>
                    <td><?= $this->Number->format($notificacionescita->id_entrenador) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Actividad') ?></th>
                    <td><?= $this->Number->format($notificacionescita->id_actividad) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notificacion') ?></th>
                    <td><?= $this->Number->format($notificacionescita->notificacion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Leida') ?></th>
                    <td><?= $notificacionescita->leida ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
