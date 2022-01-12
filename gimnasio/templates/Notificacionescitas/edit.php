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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $notificacionescita->id_notificacion],
                ['confirm' => __('Are you sure you want to delete # {0}?', $notificacionescita->id_notificacion), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Notificacionescitas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="notificacionescitas form content">
            <?= $this->Form->create($notificacionescita) ?>
            <fieldset>
                <legend><?= __('Edit Notificacionescita') ?></legend>
                <?php
                    echo $this->Form->control('id_entrenador');
                    echo $this->Form->control('id_actividad');
                    echo $this->Form->control('notificacion');
                    echo $this->Form->control('leida');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
