<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Entrenadore $entrenadore
 */
?>
<div class="column-responsive column-80">
    <div class="entrenadores view content">
        <table>
            <tr>
                <th><?= __('Nombre') ?></th>
                <td><?= h($entrenadore->nombre) ?></td>
            </tr>
            <tr>
                <th><?= __('Usuario') ?></th>
                <td><?= h($entrenadore->usuario) ?></td>
            </tr>
            <tr>
                <th><?= __('Horas Libres') ?></th>
                <td><?= h($entrenadore->horas_libres) ?></td>
            </tr>
            <tr>
                <th><?= __('Horas Reservadas') ?></th>
                <td><?= h($entrenadore->horas_reservadas) ?></td>
            </tr>
            <tr>
                <th><?= __('Id Entrenador') ?></th>
                <td><?= $this->Number->format($entrenadore->id_entrenador) ?></td>
            </tr>
            <tr>
                <th><?= __('Salario') ?></th>
                <td><?= $this->Number->format($entrenadore->salario) ?></td>
            </tr>
            <tr>
                <th><?= __('Telefono') ?></th>
                <td><?= $this->Number->format($entrenadore->telefono) ?></td>
            </tr>
            <tr>
                <th><?= __('Rol') ?></th>
                <td><?= h('Entrenador') ?></td>
            </tr>
            <tr>
                <th><?= __('Fecha Nacimiento') ?></th>
                <td><?= $this->Time->format($entrenadore->fecha_nacimiento, "dd-MM-YYYY") ?></td>
            </tr>
        </table>
        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right', 'style' => 'margin-top: 20px']) ?>          
    
    </br></br>
    </div>
</div>
