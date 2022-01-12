<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Centro $centro
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $centro->id_centro],
                ['confirm' => __('Are you sure you want to delete # {0}?', $centro->id_centro), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Centros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="centros form content">
            <?= $this->Form->create($centro) ?>
            <fieldset>
                <legend><?= __('Edit Centro') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('telefono');
                    echo $this->Form->control('direccion');
                    echo $this->Form->control('id_sede');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
