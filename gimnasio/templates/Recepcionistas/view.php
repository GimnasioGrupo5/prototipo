<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Recepcionista $recepcionista
 */

$id_usuario = explode("-", $recepcionista->usuario);
?>
<div class="column-responsive column-80">
    <div class="recepcionistas view content">
        <table>
            <tr>
                <th><?= __('Nombre') ?></th>
                <td><?= h($recepcionista->nombre) ?></td>
            </tr>
            <tr>
                <th><?= __('Usuario') ?></th>
                <td><?= h($recepcionista->usuario) ?></td>
            </tr>
            <tr>
                <th><?= __('Salario') ?></th>
                <td><?= $this->Number->format($recepcionista->salario) ?></td>
            </tr>
            <tr>
                <th><?= __('Telefono') ?></th>
                <td><?= $this->Number->format($recepcionista->telefono) ?></td>
            </tr>
            <tr>
                <th><?= __('Id Rol') ?></th>
                <td><?= h('Recepcionista') ?></td>
            </tr>
            <tr>
                <th><?= __('Fecha Nacimiento') ?></th>
                <td><?= $this->Time->format($recepcionista->fecha_nacimiento, "dd-MM-YYYY") ?></td>
            </tr>
        </table>
        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right', 'style' => 'margin-top: 15px;']) ?>  
        <br/><br/>
    </div>
</div>
