<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Calendarioactividade $calendarioactividade
 */
?>
<div class="column-responsive column-80">
    <div class="calendarioactividades form content">
        <?= $this->Form->create($calendarioactividade) ?>
        <fieldset>
            <legend><?= __('Programar actividad') ?></legend>
            <?php
                echo $this->Form->label('Actividad');
                echo $this->Form->input('id_actividad', [
                    'options' => $lista_actividades,
                    'type' => 'select',   
                    'required' => 'true',                 
                ]);
                echo $this->Form->label('Sala');
                echo $this->Form->input('id_sala', [
                    'options' => $lista_salas,
                    'type' => 'select',   
                    'required' => 'true',                 
                ]);
                echo $this->Form->label('Monitor');
                echo $this->Form->input('id_monitor', [
                    'options' => $lista_monitores,
                    'type' => 'select',   
                    'required' => 'true',                 
                ]);       
                echo $this->Form->control('fecha');
                echo $this->Form->control('horario');
                echo $this->Form->control('ocupacion', ['label'=>'', 'value' => '0', 'style'=>"visibility:hidden"]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Enviar')) ?>
        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
