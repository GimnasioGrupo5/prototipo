<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Limpiadore $limpiadore
 */
?>
<div class="column-responsive column-80">
    <div class="limpiadores view content">
        <table>
            <tr>
                <th><?= __('Nombre') ?></th>
                <td><?= h($limpiadore->nombre) ?></td>
            </tr>
            <tr>
                <th><?= __('Usuario') ?></th>
                <td><?= h($limpiadore->usuario) ?></td>
            </tr>
            <tr>
                <th><?= __('Turno') ?></th>
                <?php if($limpiadore->turno === 1){
                        $turno = "Mañana";
                    }else{
                        $turno = "Tarde";
                    }
                    ?>
                <td><?= h($turno) ?></td>
            </tr>
            <tr>
                <th><?= __('Salario') ?></th>
                <td><?= $this->Number->format($limpiadore->salario). "€" ?></td>
            </tr>
            <tr>
                <th><?= __('Telefono') ?></th>
                <td><?= h($limpiadore->telefono) ?></td>
            </tr>
            <tr>
                <th><?= __('Rol') ?></th>
                <td><?= ('Limpiador') ?></td>
            </tr>
            <tr>
                <th><?= __('Zona') ?></th>
                <td><?= $this->Number->format($limpiadore->zona) ?></td>
            </tr>
            <tr>
                <th><?= __('Fecha Nacimiento') ?></th>
                <td><?= $this->Time->format($limpiadore->fecha_nacimiento, "dd-MM-YYYY") ?></td>
            </tr>
        </table>
        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right', 'style' => 'margin-top: 20px']) ?>          
    
    </br></br>
    </div>
</div>
