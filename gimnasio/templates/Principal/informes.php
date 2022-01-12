<div class="column-responsive column-80">
    <div class="informes form content">
    <h3><?= __('Generar informe') ?></h3>
        <?= $this->Form->create($informes, ['url' => ['action' => 'gestionInformes']]) ?>
        <fieldset>
            <?php
                echo "<br/>". $this->Form->label('Seleccionar trimestre');
                echo $this->Form->input('trimestre', [
                    'options' => array("1" => "Primer trimestre", "2" => "Segundo trimestre", "3" => "Tercer trimestre", "4" => "Cuarto trimestre"),
                    'type' => 'select',   
                    'required' => 'true',                 
                ]);
                echo "<br/>". $this->Form->label('Tipo informe');
                echo $this->Form->input('informe', [
                    'options' => array("1" => "Actividades y servicios", "2" => "Valoraciones negativas monitores"),
                    'type' => 'select',   
                    'required' => 'true',                 
                ]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Generar informe')) ?>
        <?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'index'], ['class' => 'button float-right']) ?><br/><br/>
        <?= $this->Form->end() ?>
    </div>
</div>