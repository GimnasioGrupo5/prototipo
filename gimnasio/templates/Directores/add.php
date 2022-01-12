<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Directore $directore
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Directores'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="directores form content">
            <?= $this->Form->create($directore) ?>
            <fieldset>
                <legend><?= __('Add Directore') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('salario');
                    echo $this->Form->control('telefono');
                    echo $this->Form->control('fecha_nacimiento', ['empty' => true]);
                    echo "Usuario: ". $_GET['usuario']. "<br/>";
                    switch($_GET['id_rol'])
                    {
                        case 1: $rol = "Director"; break;   
                        case 2: $rol = "Monitor"; break; 
                        case 3: $rol = "Entrenador"; break; 
                        case 4: $rol = "Recepcionista"; break; 
                        case 5: $rol = "Limpiador"; break; 
                        case 6: $rol = "Socio"; break; 
                    }
                    echo "Rol: ". $_GET['id_rol'];
                    echo $this->Form->control('usuario', ['label'=>'', 'value' => $_GET['usuario'], 'style'=>"visibility:hidden"]);
                    echo $this->Form->control('id_rol', ['label'=>'', 'value' => $_GET['id_rol'], 'style'=>"visibility:hidden"]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Enviar')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
