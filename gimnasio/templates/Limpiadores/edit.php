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
                echo $this->Form->control('id_rol');
                echo "<br/>". $this->Form->label('turno');
                echo $this->Form->input('turno', [
                    'options' => array("1" => "Mañana", "2" => "Tarde"),
                    'type' => 'select',   
                    'required' => 'true',
                    'selected' => $limpiadore->turno,           
                ]);
                echo "<br/>". $this->Form->label('zona');
                echo $this->Form->input('zona', [
                    'options' => array("1" => "Servicios", "2" => "Salas actividades", "2" => "Sala principal"),
                    'type' => 'select',   
                    'required' => 'true',    
                    'selected' => $limpiadore->zona,             
                ]);
                echo "Usuario: ". $limpiadore->usuario. "<br/>";
                echo "Rol: ". $lista_roles[$limpiadore->id_rol];
            ?>
        </fieldset>
        <?= $this->Form->button(__('Enviar')) ?>
        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right']) ?>   
        <?= $this->Form->end() ?>
    </div>
</div>
