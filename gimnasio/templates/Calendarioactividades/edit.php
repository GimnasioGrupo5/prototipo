<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Calendarioactividade $calendarioactividade
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $calendarioactividade->id_registro],
                ['confirm' => __('Are you sure you want to delete # {0}?', $calendarioactividade->id_registro), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Calendarioactividades'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="calendarioactividades form content">
            <?= $this->Form->create($calendarioactividade) ?>
            <fieldset>
                <legend><?= __('Edit Calendarioactividade') ?></legend>
                <?php
                echo $this->Form->label('Actividad');
                echo $this->Form->input('id_actividad', [
                    'options' => $lista_actividades,
                    'type' => 'select',   
                    'required' => 'true',
                    'selected' => $lista_actividades[$calendarioactividade->id_actividad],              
                ]);
                echo $this->Form->label('Sala');
                echo $this->Form->input('id_sala', [
                    'options' => $lista_salas,
                    'type' => 'select',   
                    'required' => 'true',  
                    'selected' => $lista_actividades[$calendarioactividade->id_actividad],                
                ]);
                echo $this->Form->label('Monitor');
                echo $this->Form->input('id_monitor', [
                    'options' => $lista_monitores,
                    'type' => 'select',   
                    'required' => 'true',           
                    'selected' => $lista_actividades[$calendarioactividade->id_actividad],       
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
</div>
