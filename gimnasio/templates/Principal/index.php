<div class="principal index content">
    <?php
    //Se cargarán las opciones según el rol del usuario logado
    if($cuser['id_rol'] === 1)
    {
        echo $this->Html->link(__('Gestión de usuarios'), ['action' => 'gestionUsuarios'], ['class' => 'buttonp']);
        echo $this->Html->link(__('Gestión de actividades'), ['action' => 'gestionActividades'], ['class' => 'buttonp']);
        echo $this->Html->link(__('Gestión de servicios adicionales'), ['controller' => 'serviciosadicionales', 'action' => 'index'], ['class' => 'buttonp']);
        echo $this->Html->link(__('Reportes/Informes'), ['action' => 'informes'], ['class' => 'buttonp']);
        echo $this->Html->link(__('Consultar valoraciones monitores'), ['action' => 'consultarValoraciones'], ['class' => 'buttonp']);
    }
    if($cuser['id_rol'] === 2)
    {
       echo $this->Html->link(__('Ver actividades'), ['action' => 'monitorVerActividades'], ['class' => 'buttonp']);
    }
    if($cuser['id_rol'] === 3)
    {
       echo $this->Html->link(__('Lista socios asignados'), ['action' => 'entrenadorSocios'], ['class' => 'buttonp']);
    }
    if($cuser['id_rol'] === 4)
    {
      echo $this->Html->link(__('Gestión de usuarios'), ['action' => 'gestionUsuarios'], ['class' => 'buttonp']);
      echo $this->Html->link(__('Gestión de actividades'), ['action' => 'gestionActividades'], ['class' => 'buttonp']);
      echo $this->Html->link(__('Gestión de servicios adicionales'), ['controller' => 'serviciosadicionales', 'action' => 'index'], ['class' => 'buttonp']);
    }
    if($cuser['id_rol'] === 5)
    {
      echo $this->Html->link(__('Zona asignada'), ['action' => 'zonaAsignada'], ['class' => 'buttonp']);
      echo $this->Html->link(__('Intercambiar turno'), ['action' => 'intercambiarTurno'], ['class' => 'buttonp']);
    }
    if($cuser['id_rol'] === 6)
    {       
       echo $this->Html->link(__('Actividades'), ['action' => 'actividadesSocio'], ['class' => 'buttonp']);
       echo $this->Html->link(__('Resumen de actividades'), ['action' => 'resumenSemanal'], ['class' => 'buttonp']);
       echo $this->Html->link(__('Solicitar entrenador personal'), ['action' => 'solicitarEntrenador'], ['class' => 'buttonp']);
       echo $this->Html->link(__('Servicios adicionales'), ['action' => 'serviciosAdicionales'], ['class' => 'buttonp']);
    }

    ?>
</div>
