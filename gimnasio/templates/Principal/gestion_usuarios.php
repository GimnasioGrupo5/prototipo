<div class="principal index content">
    <?= $this->Html->link(__('Nuevo usuario'), ['controller' => 'users', 'action' => 'add'], ['class' => 'buttonp']) ?>
    <?= $this->Html->link(__('Directores'), ['controller' => 'directores', 'action' => 'index'], ['class' => 'buttonp']) ?>
    <?= $this->Html->link(__('Monitores'), ['controller' => 'monitores', 'action' => 'index'], ['class' => 'buttonp']) ?>
    <?= $this->Html->link(__('Entrenadores'), ['controller' => 'entrenadores', 'action' => 'index'], ['class' => 'buttonp']) ?>
    <?= $this->Html->link(__('Recepcionistas'), ['controller' => 'recepcionistas', 'action' => 'index'], ['class' => 'buttonp']) ?>
    <?= $this->Html->link(__('Limpiadores'), ['controller' => 'limpiadores', 'action' => 'index'], ['class' => 'buttonp']) ?>
    <?= $this->Html->link(__('Socios'), ['controller' => 'socios', 'action' => 'index'], ['class' => 'buttonp']) ?>

    <br/><br/>
    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right']) ?>
    <br/><br/>
</div>
