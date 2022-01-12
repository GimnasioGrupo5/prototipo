<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Limpiadore $limpiadore
 */
?>
<div class="column-responsive column-80">
    <div class="limpiadores form content">
        <?= $this->Form->create($limpiadore) ?>
        <fieldset>
            <?php
                echo $this->Form->control('nombre');
                echo $this->Form->control('salario');
                echo $this->Form->control('telefono');
                echo $this->Form->control('fecha_nacimiento', ['empty' => true]);
                echo "Usuario: ". $_GET['usuario']. "<br/>";                  
                echo "Rol: ". $lista_roles[$_GET['id_rol']];                           
                echo "<br/>". $this->Form->label('turno');
                echo $this->Form->input('turno', [
                    'options' => array("1" => "Mañana", "2" => "Tarde"),
                    'type' => 'select',   
                    'required' => 'true',                 
                ]);
                echo "<br/>". $this->Form->label('zona');
                echo $this->Form->input('zona', [
                    'options' => array("1" => "Servicios", "2" => "Salas actividades", "2" => "Sala principal"),
                    'type' => 'select',   
                    'required' => 'true',                 
                ]);
                echo $this->Form->control('usuario', ['label'=>'', 'value' => $_GET['usuario'], 'style'=>"visibility:hidden"]);
                echo $this->Form->control('id_rol', ['label'=>'', 'value' => $_GET['id_rol'], 'style'=>"visibility:hidden"]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Enviar')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
