<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Monitore $monitore
 */
?>
<div class="column-responsive column-80">
    <div class="monitores form content">
        <?= $this->Form->create($monitore) ?>
        <fieldset>
            <?php
                echo $this->Form->control('nombre');
                echo $this->Form->control('salario');
                echo $this->Form->control('telefono');
                echo $this->Form->control('fecha_nacimiento', ['empty' => true]);
                echo $this->Form->label('turno');
                echo $this->Form->input('turno', [
                    'options' => array("1" => "Mañana", "2" => "Tarde"),
                    'type' => 'select',   
                    'required' => 'true',
                    'selected' => $monitore->turno,                 
                ]);
                echo $this->Form->label('Actividad especialista');
                echo $this->Form->input('actividad_especialista', [
                    'options' => $lista_actividades,
                    'type' => 'select',   
                    'required' => 'true',   
                    'selected' => $lista_actividades[$monitore->actividad_especialista],              
                ]);
                echo "Usuario: ". $monitore->usuario. "<br/>";
                echo "Rol: ". $lista_roles[$monitore->id_rol];
            ?>
        </fieldset>
        <?= $this->Form->button(__('Enviar')) ?>
        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right']) ?>          
        <?= $this->Form->end() ?>
    </div>
</div>
