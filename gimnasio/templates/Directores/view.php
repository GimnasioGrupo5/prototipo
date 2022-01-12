<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Directore $directore
 */
?>
<div class="column-responsive column-80">
    <div class="directores view content">
        <table>
            <tr>
                <th><?= __('Nombre') ?></th>
                <td><?= h($directore->nombre) ?></td>
            </tr>
            <tr>
                <th><?= __('Usuario') ?></th>
                <td><?= h($directore->usuario) ?></td>
            </tr>
            <tr>
                <th><?= __('Salario') ?></th>
                <td><?= $this->Number->format($directore->salario). "€" ?></td>
            </tr>
            <tr>
                <th><?= __('Telefono') ?></th>
                <td><?= h($directore->telefono) ?></td>
            </tr>
            <tr>
                <th><?= __('Fecha Nacimiento') ?></th>
                <td><?= $this->Time->format($directore->fecha_nacimiento, "dd-MM-YYYY") ?></td>
            </tr>
            <tr>
                <th><?= __('Rol') ?></th>
                <td><?= ('Director') ?></td>
            </tr>
        </table>
        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right', 'style' => 'margin-top: 20px']) ?>          
    
    </br></br>
    </div>
</div>
