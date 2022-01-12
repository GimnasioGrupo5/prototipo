<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepcionista[]|\Cake\Collection\CollectionInterface $recepcionistas
 */

?>

<div class="solicitar index content">
    <label> Tu zona asignada es: </label>    
    <?php
    switch($limpiador[0]['zona'])
    {
        case 1: $zona = "Servicios y duchas"; $sala = "1"; break; 
        case 2: $zona = "Salas de actividades"; $sala = "2";break; 
        case 3: $zona = "Sala principal"; $sala = "3"; break; 
    }
    ?>
    <?= h($zona) ?>
    <br/><br/><br/>
    <?php 
    if($limpiador[0]['zona'] == 1)
    {
        echo $this->Html->image('1.png', array('alt' => 'Imagen', 'border' => '1', 'height' => '350', 'width' => '750'));
    }if($limpiador[0]['zona'] == 2)
    {
        echo $this->Html->image('2.png', array('alt' => 'Imagen', 'border' => '1', 'height' => '350', 'width' => '750'));
    }else{
        echo $this->Html->image('3.png', array('alt' => 'Imagen', 'border' => '1', 'height' => '350', 'width' => '750'));
    } ?>

    <br/><br/><?= $this->Html->link(__('Volver'), ['controller' => 'principal', 'action' => 'index'], ['class' => 'button float-right']) ?><br/><br/>
</div>