<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Socio $socio
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Socios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="socios form content">
            <?= $this->Form->create($socio) ?>
            <fieldset>
                <legend><?= __('Add Socio') ?></legend>
                <?php
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('telefono');
                    echo $this->Form->control('email');
                    echo $this->Form->label('Tipo cuenta');
                    echo $this->Form->input('tipo_cuenta', [
                    'options' => array("1" => "Estandar", "2" => "Premium"),
                    'type' => 'select',   
                    'required' => 'true',                 
                    ]);
                    echo $this->Form->control('id_entrenador',['label'=>'', 'value' => '0', 'style'=>"visibility:hidden"]);
                    echo $this->Form->control('suspendido');
                    echo $this->Form->control('cuenta_banco');
                    echo "Usuario: ". $_GET['usuario']. "<br/>";
                    echo "Rol: ". $lista_roles[$_GET['id_rol']];
                    echo $this->Form->control('usuario', ['label'=>'', 'value' => $_GET['usuario'], 'style'=>"visibility:hidden"]);
                    echo $this->Form->control('id_rol', ['label'=>'', 'value' => $_GET['id_rol'], 'style'=>"visibility:hidden"]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
