<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Serviciosadicionale $serviciosadicionale
 */
?>
<div class="column-responsive column-80">
    <div class="serviciosadicionales form content">
        <?= $this->Form->create($serviciosadicionale) ?>
        <fieldset>
            <legend><?= __('Añadir servicios adicionales') ?></legend>
            <?php
                echo $this->Form->control('nombre');
                echo $this->Form->label('Centro');
                echo $this->Form->input('id_centro', [
                    'options' => $lista_centros,
                    'type' => 'select',   
                    'required' => 'true',                 
                ]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Enviar')) ?>
        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
