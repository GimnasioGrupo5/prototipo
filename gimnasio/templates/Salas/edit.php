<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sala $sala
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sala->id_sala],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sala->id_sala), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Salas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="salas form content">
            <?= $this->Form->create($sala) ?>
            <fieldset>
                <legend><?= __('Edit Sala') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('aforo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
