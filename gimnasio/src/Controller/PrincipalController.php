<?php
declare(strict_types=1);

namespace App\Controller;


class PrincipalController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $user = $this->request->getSession()->read('Auth');
        if(isset($user) and $user['id_rol'] == 1)
        {
            $this->Auth->allow(array('consultarValoraciones', 'gestionInformes', 'informes'));
        }
        if(isset($user) and $user['id_rol'] == 1 or isset($user) and $user['id_rol'] == 4)
        {
            $this->Auth->allow(array('gestionUsuarios', 'gestionActividades', 'logout'));
        }
        if(isset($user) and $user['id_rol'] == 2)
        {
            $this->Auth->allow(array('monitorVerActividades'));
        }
        if(isset($user) and $user['id_rol'] == 3)
        {
            $this->Auth->allow(array('entrenadorSocios'));
        }
        if(isset($user) and $user['id_rol'] == 5)
        {
            $this->Auth->allow(array('zonaAsignada','intercambiarTurno','solicitudCambio'));
        }
        if(isset($user) and $user['id_rol'] == 6)
        {
       $this->Auth->allow(array('solicitarEntrenador','serviciosAdicionales', 'actividadesSocio','resumenSemanal', 'asignarEntrenador', 'apuntarActividad', 'registrarPulsera', 'valorarMonitor', 'guardarNota'));
        }
    }    

    public function index()
    {        
        $user = $this->request->getSession()->read('Auth');
        if(isset($user) and $user['id_rol'] === 1)
        {
            $this->loadModel("Notificacionescitas");

            $notificaciones = $this->Notificacionescitas->find('all')->toArray();  

            $this->set(compact('notificaciones'));
        }
    }

    public function informes()
    { 
        $informes = null;
        $this->set(compact('informes'));
    }

    //Gestion de informes
    public function gestionInformes()
    {        
        $this->loadModel("Actividades");
        $this->loadModel("Monitores");
        $this->loadModel("Sociosserviciosadicionales");
        $this->loadModel("Calendarioactividades");
        $this->loadModel("Serviciosadicionales");
        $this->loadModel("Socios");
        $this->loadModel("Salas");

        $monitores = $this->Monitores->find()->all()->toArray();
        foreach($monitores as $moni){
            $lista_monitores[$moni['id_monitor']] = $moni["nombre"];
        }
        $horario = $this->Calendarioactividades->find()->all()->toArray();
        foreach($horario as $h){
            $horarios[$h['id_registro']] = $h["horario"];
        }
        $salas = $this->Salas->find()->all()->toArray();
        foreach($salas as $s){
            $lista_salas[$s['id_sala']] = $s["nombre"];
        }
        $servicios = $this->Serviciosadicionales->find()->all()->toArray();
        foreach($servicios as $s){
            $lista_servicios[$s['id_servicio']] = $s["nombre"];
        }
        $socios = $this->Socios->find()->all()->toArray();
        foreach($socios as $s){
            $lista_socios[$s['id_socio']] = $s["nombre"];
        }

        $anio = date("Y");
        switch($_POST['trimestre'])
        {

            case 1: $titulo="Informe primer trimestre"; $fecha1= $anio.'-01-01'; $fecha2=$anio.'-03-31'; break;
            case 1: $titulo="Informe segundo trimestre"; $fecha1=$anio.'-04-01'; $fecha2= $anio.'-06-30'; break;
            case 1: $titulo="Informe tercer trimestre"; $fecha1=$anio.'-07-01'; $fecha2= $anio.'-09-30'; break;
            case 1: $titulo="Informe cuarto trimestre"; $fecha1=$anio.'-10-01'; $fecha2= $anio.'-12-31'; break;
        }
        $informe = $_POST['informe'];
        if($_POST['informe'] == 1)
        {
            $actividades = $this->Actividades->find('all', ['conditions' => array('fecha BETWEEN "'.$fecha1.'" AND "'.$fecha2.'"')]);
            $servicios = $this->Sociosserviciosadicionales->find('all', ['conditions' =>array('fecha BETWEEN "'.$fecha1.'" AND "'.$fecha2.'"')])->toArray();              
            $this->set(compact('actividades'));
            $this->set(compact('servicios'));

        }
        else
        {
            //valoraciones negativas        
            $valoraciones = $this->Actividades->find('all', ['conditions' => array('nota_evaluacion <=' => 4, 'fecha BETWEEN "'.$fecha1.'" AND "'.$fecha2.'"')])->toArray();
            $this->set(compact('valoraciones'));
        }

        $this->set(compact('lista_monitores'));
        $this->set(compact('titulo'));
        $this->set(compact('informe'));
        $this->set(compact('horarios'));
        $this->set(compact('lista_salas'));
        $this->set(compact('lista_servicios'));
        $this->set(compact('lista_socios'));
    }


    //Muestra las valoraciones de los monitores
    public function consultarValoraciones()
    {        
        $this->loadModel("Actividades");
        $this->loadModel("Monitores");
        $valoraciones = $this->Actividades->find('all', ['conditions' => array('nota_evaluacion !=' => -1)])->toArray();

        $monitores = $this->Monitores->find()->all()->toArray();
        foreach($monitores as $moni){
            $lista_monitores[$moni['id_monitor']] = $moni["nombre"];
        }

        $media = $this->Actividades->find('all', ['conditions' => array('nota_evaluacion !=' => -1), 
        'group by' => array('id_monitor'), 'order' => array('nota_evaluacion ASC')])->toArray();
        
        $this->set(compact('valoraciones'));
        $this->set(compact('lista_monitores'));
        $this->set(compact('media'));
    }

    //Muestra la zona asignada al limpiador
    public function zonaAsignada()
    {        
        $this->loadModel("Limpiadores");
        $user = $this->request->getSession()->read('Auth');
        $limpiador = $this->Limpiadores->find('all', ['conditions' => array('usuario' => $user['usuario'])])->toArray();

        $this->set(compact('limpiador'));
    }

    //Muestra la zona asignada al limpiador
    public function intercambiarTurno()
    {        
        $this->loadModel("Limpiadores");
        $user = $this->request->getSession()->read('Auth');
        $limpiador = $this->Limpiadores->find('all', ['conditions' => array('usuario' => $user['usuario'])])->toArray();
        $otros = $this->Limpiadores->find('all', ['conditions' => array('usuario !=' => $user['usuario'])])->toArray();

        $this->set(compact('limpiador'));
        $this->set(compact('otros'));
    }

    //Muestra la zona asignada al limpiador
    public function solicitudCambio()
    {        
        $this->Flash->success(__('Se ha solicitado el cambio'));
        return $this->redirect(['action' => 'intercambiarTurno']);
    }

    //Funcion para que los socios vean el listado de servicios adicionales y puedan apuntarse
    public function serviciosAdicionales()
    {        
        //Cargamos los servicios adicionales disponibles en el centro del usuario
        $this->loadModel("Serviciosadicionales");
        $user = $this->request->getSession()->read('Auth');

        $servicios = $this->Serviciosadicionales->find('all', ['conditions' => array('id_centro' => $user['id_centro'])])->toArray();

        //Cargamos los servicios contratados por el socio
        $this->loadModel("Sociosserviciosadicionales");
        $this->loadModel("Socios");
        $socio = $this->Socios->find('all', ['conditions' => array('usuario' => $user['usuario'])])->toArray();
        $servicios_socio = $this->Sociosserviciosadicionales->find('all', ['conditions' => array('id_socio' => $socio[0]['id_socio'])])->toArray();

        $this->set(compact('servicios'));
        $this->set(compact('servicios_socio'));
    }

    public function entrenadorSocios()
    {            
      //revisamos si el socio ya tiene una cita con un entrenador para el dia
      $this->loadModel("Citasentrenador");
      $this->loadModel("Socios");

      $citas = $this->Citasentrenador->find('all', ['conditions' => array('fecha' => ''.date('Y-m-d').'')])->toArray();   

      if(!empty($citas))
      {
        $socio = $this->Socios->find('all', ['conditions' => array('id_socio' => $citas[0]['id_socio'])])->toArray();

        $this->set(compact('citas'));
        $this->set(compact('socio'));
      }
        $this->set(compact('citas'));
        
    }

    //Obtiene los datos de la actividad y monitor para la valoración del socio
    public function valorarMonitor($id_actividad)
    {
        $this->loadModel("Actividades");
        $this->loadModel("Tipoactividades");
        $this->loadModel("Calendarioactividades");
        $this->loadModel("Monitores");  

        //Cargamos los datos de la actividad
        $actividad = $this->Actividades->get($id_actividad, [
            'contain' => [],
        ]);

        $tipo = $this->Tipoactividades->find()->all()->toArray();
        foreach($tipo as $tip){
            $lista_tipos[$tip['id_actividad']] = $tip["nombre"];
        }

        $calen = $this->Calendarioactividades->find()->all()->toArray();
        foreach($calen as $cal){
            $horario[$cal['id_registro']] = $cal["horario"];
        }
        foreach($calen as $cal){
            $fecha[$cal['id_registro']] = $cal["fecha"];
        }

        $monitor = $this->Monitores->find()->all()->toArray();
        foreach($monitor as $moni){
            $lista_monitores[$moni['id_monitor']] = $moni["nombre"];
        }

        $this->set(compact('actividad'));
        $this->set(compact('lista_tipos'));
        $this->set(compact('horario'));
        $this->set(compact('fecha'));
        $this->set(compact('lista_monitores'));

    }

    //Guarda la nota en la tabla de actividades
    public function guardarNota()
    {
        $this->loadModel('Actividades');

        $actividad = $this->Actividades->get($_POST['id_actividad'], [
            'contain' => [],
        ]);

        print_r($actividad);
        //Guardamos la nota y el comentario
        $actividad = $this->Actividades->patchEntity($actividad, $this->request->getData());
        $actividad['nota_evaluacion'] = $_POST['nota'];
        $actividad['comentario'] = $_POST['comentario'];

        if ($this->Actividades->save($actividad)) {
            $this->Flash->success(__('La evaluación se ha guardado correctamente'));

            return $this->redirect(['action' => 'index']);
            }
            
    }

    public function gestionUsuarios()
    {
    }

    //Funcion para solicitar un entrenador personal en el dia
    public function solicitarEntrenador()
    {        
        //revisamos si el socio ya tiene una cita con un entrenador para el dia
        $this->loadModel("Citasentrenador");
        $this->loadModel("Socios");
        $this->loadModel("Entrenadores");
        $user = $this->request->getSession()->read('Auth');
        $socio = $this->Socios->find('all', ['conditions' => array('usuario' => $user['usuario'])])->toArray();

        $cita = $this->Citasentrenador->find('all', ['conditions' => array('id_socio' => $socio[0]['id_socio'], 'fecha' => ''.date('Y-m-d').'')])->toArray();   

        if(!empty($cita))
        {
            $entrenador = $this->Entrenadores->find('all', ['conditions' => array('id_entrenador' => $cita[0]['id_entrenador'])])->toArray();
            
            $this->set(compact('cita'));
            $this->set(compact('entrenador'));
        }
        $this->set(compact('cita'));
    }

    public function asignarEntrenador()
    {
        /* EN UN PRINCIPIO SE ASIGNABA UN ENTRENADOR AL SOCIO PARA SIEMPRE, PERO AHORA SE GESTIONA EN CITASENTRENADOR
        //Buscamos los entrenadores disponibles con más horas libres y asignamos al usuario
        $this->loadModel("Entrenadores");
        $this->loadModel("Socios");
        //Cargamos los datos de entrenadores y socios para revisar que se pueda asignar
        $entrenadores_libres = $this->Entrenadores->find('all', ['conditions' => array('horas_libres >' => '0'), 'order' => array('horas_libres ASC')])->toArray();
        $user = $this->request->getSession()->read('Auth');
        $socio = $this->Socios->find('all', ['conditions' => array('usuario' => $user['usuario'])])->toArray();      

        if($socio[0]['id_entrenador'] != 0)
        {
            $this->Flash->error(__('Ya tienes asignado un entrenador'));
            return $this->redirect(['action' => 'index']);
        }
        if(empty($entrenadores_libres)){
            $this->Flash->error(__('No hay entrenadores con horas libres disponibles'));
            return $this->redirect(['action' => 'index']);
        }
        
        $id = $entrenadores_libres[0]['id_entrenador'];

        $entrenador = $this->Entrenadores->get($id, [
            'contain' => [],
        ]);
        //Modificamos las horas libres y reservadas del entrenador, restando una a las libres y sumando una a las reservadas
            $entrenador = $this->Entrenadores->patchEntity($entrenador, $this->request->getData());            
            $entrenador['horas_libres'] = $entrenador['horas_libres'] - 1;
            $entrenador['horas_reservadas'] = $entrenador['horas_reservadas'] + 1;
            //Guardamos los cambios en la bbdd
            if ($this->Entrenadores->save($entrenador)) { 
                $id_socio = $socio[0]['id_socio'];

                //Modificamos el id entrenador en la tabla socio
                $socio = $this->Socios->get($id_socio, [
                    'contain' => [],
                ]);
                $socio = $this->Socios->patchEntity($socio, $this->request->getData());  
                $socio['id_entrenador'] = $id;
                if ($this->Socios->save($socio)) {
                    $this->Flash->success(__('El entrenador se ha asignado correctamente.'));

                    return $this->redirect(['action' => 'index']);
                }
            }      */     
    }

    //Muestra las actividades y permite apuntarse al socio
    public function actividadesSocio()
    {
        $this->loadModel("Calendarioactividades");
        $actividades = $this->Calendarioactividades->find()->toArray();

        $this->loadModel("Salas");
        $datos_salas = $this->Salas->find()->all()->toArray();
        foreach($datos_salas as $salas){
            $lista_salas[$salas['id_sala']] = $salas["nombre"];
        }
        foreach($datos_salas as $salas){
            $aforo_salas[$salas['id_sala']] = $salas["aforo"];
        }

        $this->loadModel("Tipoactividades");
        $datos_actividades = $this->Tipoactividades->find()->all()->toArray();
        $lista_actividades;
        foreach($datos_actividades as $actividad){
            $lista_actividades[$actividad['id_actividad']] = $actividad["nombre"];
        }
        $this->set(compact('actividades'));
        $this->set(compact('lista_salas'));
        $this->set(compact('aforo_salas'));
        $this->set(compact('lista_actividades'));
    }

    public function apuntarActividad($actividad)
    {
        $this->loadModel("Actividades");
        $this->loadModel("Calendarioactividades");
        $this->loadModel("Tipoactividades");
        $this->loadModel("Salas");
        $this->loadModel("Monitores");

        $actividades = $this->Actividades->newEmptyEntity();

        //Cargamos la actividad
        $actividad = $this->Calendarioactividades->get($actividad, [
            'contain' => [],
        ]);        

        //Cargamos el tipo de actividad
        $tipo_actividad = $this->Tipoactividades->get($actividad['id_actividad'], [
            'contain' => [],
        ]);

        //Cargamos la sala
        $sala = $this->Salas->get($actividad['id_sala'], [
            'contain' => [],
        ]);

         //Cargamos el monitor
         $monitor = $this->Monitores->get($actividad['id_monitor'], [
            'contain' => [],
        ]);
        
        $user = $this->request->getSession()->read('Auth');
        $this->loadModel("Socios");
        $socio = $this->Socios->find('all', ['conditions' => array('usuario' => $user['usuario'])])->toArray();  

        //Creamos el array con los valores a introducir en la bbdd
        $registro_actividad['nombre'] = $tipo_actividad['nombre'];
        $registro_actividad['fecha'] = $actividad['fecha'];
        $registro_actividad['nota_evaluacion'] = null;
        $registro_actividad['comentario'] = '';
        $registro_actividad['reserva'] = 1;
        $registro_actividad['asistencia'] = 0;
        $registro_actividad['id_sala'] = $actividad['id_sala'];
        $registro_actividad['id_actividad'] = $actividad['id_registro'];
        $registro_actividad['id_socio'] = $socio[0]['id_socio'];
        $registro_actividad['id_monitor'] = $actividad['id_monitor'];

        $actividade = $this->Actividades->newEmptyEntity();
        if ($this->request->is('post')) {
            $actividade = $this->Actividades->patchEntity($actividade, $this->request->getData());
            
            if ($this->Actividades->save($actividade)) {

                //Aumentamos en 1 la ocupación de la actividad
                $actividad['ocupacion'] = $actividad['ocupacion'] + 1;
                if ($this->Calendarioactividades->save($actividad))
                {
                    $this->Flash->success(__('Te has apuntado correctamente'));                
                    return $this->redirect(['action' => 'actividadesSocio']);
                }
                
            }else{
                $this->Flash->error(__('The actividade could not be saved. Please, try again.'));
            }

        }
        $this->set(compact('actividade'));
        $this->set(compact('actividad'));
        $this->set(compact('sala'));
        $this->set(compact('monitor'));
        $this->set(compact('tipo_actividad'));
        $this->set(compact('registro_actividad'));
    }

    //Muestra las actividades apuntadas
    public function resumenSemanal()
    {
        $this->loadModel("Actividades");
        $this->loadModel("Calendarioactividades");
        $this->loadModel("Tipoactividades");
        $this->loadModel("Salas");
        $this->loadModel("Monitores");
        $this->loadModel("Socios");

        $user = $this->request->getSession()->read('Auth');        
        $socio = $this->Socios->find('all', ['conditions' => array('usuario' => $user['usuario'])])->toArray();
        
        //Cargamos las actividades en las que el socio se ha registrado
        $actividades = $this->Actividades->find('all', ['conditions' => array('id_socio' => $socio[0]['id_socio'])])->toArray();
        
        //Cargamos los tipos de actividad
        $tipo_actividades = $this->Tipoactividades->find()->toArray();
        $lista_tipos;
        foreach($tipo_actividades as $tipo){
            $lista_tipos[$tipo['id_actividad']] = $tipo["nombre"];
        }

        $cal_actividades = $this->Calendarioactividades->find()->toArray();
        $lista_horarios;
        foreach($cal_actividades as $cal){
            $lista_horarios[$cal['id_registro']] = $cal["horario"];
        }

        //Cargamos las salas
        $salas = $this->Salas->find()->toArray();
        $lista_salas;
        foreach($salas as $sal){
            $lista_salas[$sal['id_sala']] = $sal["nombre"];
        }

         //Cargamos el monitor
        $monitores = $this->Monitores->find()->toArray();
        $lista_monitores;
        foreach($monitores as $monitor){
            $lista_monitores[$monitor['id_monitor']] = $monitor["nombre"];
        }

        $this->set(compact('actividades'));
        $this->set(compact('lista_salas'));
        $this->set(compact('lista_monitores'));
        $this->set(compact('lista_tipos'));
        $this->set(compact('lista_horarios'));

    }

    public function gestionActividades()
    {
    }

    //Simula el registro de la pulsera al entrar a la actividad
    public function registrarPulsera($id)
    {
        $this->loadModel("Actividades");
        //Cargamos los datos de la actividad
        $actividad = $this->Actividades->get($id, [
            'contain' => [],
        ]);
        
        $actividad['asistencia'] = 1;
        if ($this->Actividades->save($actividad))
                {
                    $this->Flash->success(__('Se ha registrado la asistencia'));                
                    return $this->redirect(['action' => 'resumenSemanal']);
                }                
    }

    //Muestra las actividades que imparte el monitor logado
    public function monitorVerActividades()
    {
        //Cargamos los modelos
        $user = $this->request->getSession()->read('Auth');

        $this->loadModel("Monitores");
        $monitor = $this->Monitores->find('all', ['conditions' => array('usuario' => $user['usuario'])])->toArray();        
        $id = $monitor[0]['id_monitor'];
        
        $this->loadModel("Salas");
        $datos_salas = $this->Salas->find()->all()->toArray();
        $lista_salas;
        foreach($datos_salas as $salas){
            $lista_salas[$salas['id_sala']] = $salas["nombre"];
        }

        $this->loadModel("Tipoactividades");
        $datos_actividades = $this->Tipoactividades->find()->all()->toArray();
        $lista_actividades;
        foreach($datos_actividades as $actividad){
            $lista_actividades[$actividad['id_actividad']] = $actividad["nombre"];
        }
        
        //Consultamos en la BBDD las actividades que tenga asignadas el monitor
        $this->loadModel("Calendarioactividades");
        $actividades = $this->Calendarioactividades->find('all', ['conditions' => array('id_monitor' => $id)]);

        $this->set(compact('monitor'));
        $this->set(compact('actividades'));
        $this->set(compact('lista_salas'));
        $this->set(compact('lista_actividades'));
    }

}
