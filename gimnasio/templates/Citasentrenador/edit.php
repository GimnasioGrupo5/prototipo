<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Citasentrenador $citasentrenador
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $citasentrenador->id_registro],
                ['confirm' => __('Are you sure you want to delete # {0}?', $citasentrenador->id_registro), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Citasentrenador'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="citasentrenador form content">
            <?= $this->Form->create($citasentrenador) ?>
            <fieldset>
                <legend><?= __('Edit Citasentrenador') ?></legend>
                <?php
                    echo $this->Form->control('id_socio');
                    echo $this->Form->control('id_entrenador');
                    echo $this->Form->control('fecha');
                    echo $this->Form->control('hora');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
