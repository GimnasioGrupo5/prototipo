<div class="principal index content">
    <?= $this->Html->link(__('Tipos de actividad'), ['controller' => 'tipoactividades', 'action' => 'index'], ['class' => 'buttonp']) ?>
    <?= $this->Html->link(__('Calendario de actividades'), ['controller' => 'calendarioactividades', 'action' => 'index'], ['class' => 'buttonp']) ?>
    <br/><br/>
    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right']) ?>
    <br/><br/>
</div>
