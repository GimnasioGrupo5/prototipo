<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tipoactividade $tipoactividade
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tipoactividade->id_actividad],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tipoactividade->id_actividad), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tipoactividades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="tipoactividades form content">
            <?= $this->Form->create($tipoactividade) ?>
            <fieldset>
                <legend><?= __('Edit Tipoactividade') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('tipo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
