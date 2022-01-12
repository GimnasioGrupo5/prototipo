<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tipoactividade $tipoactividade
 */
?>
<div class="column-responsive column-80">
    <div class="tipoactividades form content">
        <?= $this->Form->create($tipoactividade) ?>
        <fieldset>
            <legend><?= __('Añadir actividad') ?></legend>
            <?php
                echo $this->Form->control('nombre');
                echo $this->Form->control('tipo');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
