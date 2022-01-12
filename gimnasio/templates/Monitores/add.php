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
                ]);
                echo $this->Form->label('Actividad especialista');
                echo $this->Form->input('actividad_especialista', [
                    'options' => $lista_actividades,
                    'type' => 'select',   
                    'required' => 'true',                 
                ]);
                echo "Usuario: ". $_GET['usuario']. "<br/>";                  
                echo "Rol: ". $lista_roles[$_GET['id_rol']];
                echo $this->Form->control('usuario', ['label'=>'', 'value' => $_GET['usuario'], 'style'=>"visibility:hidden"]);
                echo $this->Form->control('id_rol', ['label'=>'', 'value' => $_GET['id_rol'], 'style'=>"visibility:hidden"]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Enviar')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
