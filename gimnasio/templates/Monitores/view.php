<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Monitore $monitore
 */
?>
<div class="column-responsive column-80">
    <div class="monitores view content">
        <table>
            <tr>
                <th><?= __('Nombre') ?></th>
                <td><?= h($monitore->nombre) ?></td>
            </tr>
            <tr>
                <th><?= __('Usuario') ?></th>
                <td><?= h($monitore->usuario) ?></td>
            </tr>
            <tr>
                <th><?= __('Salario') ?></th>
                <td><?= $this->Number->format($monitore->salario)."€"?></td>
            </tr>
            <tr>
                <th><?= __('Telefono') ?></th>
                <td><?= h($monitore->telefono) ?></td>
            </tr>
            <tr>
                <th><?= __('Turno') ?></th>
                <?php if($monitore->turno === 1){
                        $turno = "Mañana";
                    }else{
                        $turno = "Tarde";
                    }
                    ?>
                <td><?= h($turno) ?></td>
            </tr>
            <tr>
                <th><?= __('Actividad Especialista') ?></th>
                <td><?= $this->Number->format($monitore->actividad_especialista) ?></td>
            </tr>
            <tr>
                <th><?= __('Fecha Nacimiento') ?></th>
                <td><?= $this->Time->format($monitore->fecha_nacimiento, "dd-MM-YYYY") ?></td>
            </tr>
            <tr>
                <th><?= __('Rol') ?></th>
                <td><?= ('Monitor') ?></td>
            </tr>
        </table> 
        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button float-right', 'style' => 'margin-top: 20px']) ?>          
    
        </br></br>
</div>    
</div>
