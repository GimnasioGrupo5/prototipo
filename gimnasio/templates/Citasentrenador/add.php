<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Citasentrenador $citasentrenador
 */
?>
<div class="column-responsive column-80">
    <div class="citasentrenador form content">
        <?= $this->Form->create($citasentrenador) ?>
        <fieldset>
            <legend><?= __('Solicitar entrenador') ?></legend>          
                <div style="visibility: hidden; position: absolute;">
                <?php
                echo $this->Form->control('id_socio',['value'=>0]);
                echo $this->Form->control('id_entrenador',['value'=>0]);
                echo $this->Form->control('fecha',['value'=>date("dd-mm-YYYY")]);
                ?>
                </div>
                <?php                
                echo $this->Form->control('hora');
             ?>
        </fieldset>
        <?= $this->Form->button(__('Asignar entrenador')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>