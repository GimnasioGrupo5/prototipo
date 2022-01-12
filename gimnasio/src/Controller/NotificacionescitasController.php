<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Notificacionescitas Controller
 *
 * @property \App\Model\Table\NotificacionescitasTable $Notificacionescitas
 * @method \App\Model\Entity\Notificacionescita[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NotificacionescitasController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $user = $this->request->getSession()->read('Auth');
        if(isset($user) and $user['id_rol'] === 1 or isset($user) and $user['id_rol'] === 4)
        {
            $this->Auth->allow('asignarSustituto');
        }
        if(isset($user) and $user['id_rol'] === 3)
        {
            $this->Auth->allow(array('add'));
        }

    }    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $notificacionescitas = $this->paginate($this->Notificacionescitas);
        
        $this->loadModel('Entrenadores');
        $this->loadModel('Citasentrenador');

        $entrenadores = $this->Entrenadores->find()->all()->toArray();
        foreach($entrenadores as $en)
        {
            $lista_entrenadores[$en['id_entrenador']] = $en['nombre'];
        }

        $citas = $this->Citasentrenador->find()->all()->toArray();
        
        foreach($citas as $c)
        {
            $horas[$c['id_registro']] = $c['hora'];
        }
        foreach($citas as $c)
        {
            $fechas[$c['id_registro']] = $c['fecha'];
        }

        $this->set(compact('fechas'));
        $this->set(compact('horas'));
        $this->set(compact('notificacionescitas'));
        $this->set(compact('lista_entrenadores'));
    }

    /**
     * View method
     *
     * @param string|null $id Notificacionescita id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notificacionescita = $this->Notificacionescitas->get($id, [
            'contain' => [],
        ]);
        
        $this->set(compact('notificacionescita'));
    }

    //Funcion que asigna un sustituto para un entrenador
    public function asignarSustituto($id = null)
    {
        $this->loadModel('Citasentrenador');
        $this->loadModel('Entrenadores');
        $this->loadModel('Socios');

        //Recuperamos los datos de la cita
        $notificacionescita = $this->Notificacionescitas->get($id, [
            'contain' => [],
        ]);
        $notificacionescita['leida']=1;
        $this->Notificacionescitas->save($notificacionescita);

        $citas = $this->Citasentrenador->get($notificacionescita->id_actividad,[
            'contain' => [],
        ]);

        $socio = $this->Socios->get($citas->id_socio,[
            'contain' => [],
        ]);

        $socio_centro = $this->Socios->find('all', ['conditions' => array('usuario' => $socio['usuario'])])->toArray();
        
        //Buscamos los entrenadores con horas libres, excluyendo al actual
        $entrenadores_libres = $this->Entrenadores->find('all', ['conditions' => array('horas_libres >' => '0', 'id_entrenador !=' => $citas->id_entrenador), 
                                                                        array('joins' => array(array('table' => 'users',
                                                                        'alias' => 'Usuarios',
                                                                        'type' => 'INNER',
                                                                        'conditions' => array('entrenadores.usuario = users.usuario', 'users.id_centro' => $socio_centro[0]['id_centro'])))),'order' => array('horas_libres ASC')])->toArray();
        

        if(empty($entrenadores_libres)){
            $this->Flash->error(__('No hay entrenadores con horas libres disponibles'));
            return $this->redirect(['action' => 'index']);
        }else{
            $id = $entrenadores_libres[0]['id_entrenador'];
        }
        
        //Modificamos las horas libres y reservadas del entrenador antiguo
        $entrenador = $this->Entrenadores->get($citas->id_entrenador, [
            'contain' => [],
        ]);                
            $entrenador = $this->Entrenadores->patchEntity($entrenador, $this->request->getData());            
            $entrenador['horas_libres'] = $entrenador['horas_libres'] + 1;
            $entrenador['horas_reservadas'] = $entrenador['horas_reservadas'] - 1;
            $this->Entrenadores->save($entrenador);
        
        //Modificamos las horas libres y reservadas del nuevo
        $entrenador = $this->Entrenadores->get($id, [
            'contain' => [],
        ]);        
        $entrenador = $this->Entrenadores->patchEntity($entrenador, $this->request->getData());            
        $entrenador['horas_libres'] = $entrenador['horas_libres'] - 1;
        $entrenador['horas_reservadas'] = $entrenador['horas_reservadas'] + 1;
        $this->Entrenadores->save($entrenador);

        //Guardamos los cambios en la bbdd         
            $citasentrenador = $this->Citasentrenador->patchEntity($citas, $this->request->getData());                
            $citasentrenador['id_entrenador'] = $id;

            $this->Citasentrenador->save($citasentrenador);
            
            if ($this->Citasentrenador->save($citasentrenador)) {
                $this->Flash->success(__('La cita se ha modificado correctamente'));

                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('La cita no se ha podido modificar. Intentalo de nuevo.'));
                return $this->redirect(['action' => 'index']);
            }                
    }
        

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $this->loadModel('Citasentrenador');
        
        $cita = $this->Citasentrenador->find('all', ['conditions' => array('id_registro' => $id)])->toArray();   

        $notificacionescita = $this->Notificacionescitas->newEmptyEntity();
        if ($this->request->is('post')) {
            $notificacionescita = $this->Notificacionescitas->patchEntity($notificacionescita, $this->request->getData());
            if ($this->Notificacionescitas->save($notificacionescita)) {
                $this->Flash->success(__('Se ha añadido una notificación al director'));

                return $this->redirect(['controller' => 'principal', 'action' => 'entrenadorSocios']);
            }
            $this->Flash->error(__('Error, intentelo de nuevo'));
        }
        $this->set(compact('notificacionescita'));
        $this->set(compact('cita'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Notificacionescita id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notificacionescita = $this->Notificacionescitas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notificacionescita = $this->Notificacionescitas->patchEntity($notificacionescita, $this->request->getData());
            if ($this->Notificacionescitas->save($notificacionescita)) {
                $this->Flash->success(__('The notificacionescita has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notificacionescita could not be saved. Please, try again.'));
        }
        $this->set(compact('notificacionescita'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Notificacionescita id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notificacionescita = $this->Notificacionescitas->get($id);
        if ($this->Notificacionescitas->delete($notificacionescita)) {
            $this->Flash->success(__('The notificacionescita has been deleted.'));
        } else {
            $this->Flash->error(__('The notificacionescita could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
