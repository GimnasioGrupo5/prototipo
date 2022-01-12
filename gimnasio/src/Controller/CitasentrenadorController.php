<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Citasentrenador Controller
 *
 * @property \App\Model\Table\CitasentrenadorTable $Citasentrenador
 * @method \App\Model\Entity\Citasentrenador[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CitasentrenadorController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $user = $this->request->getSession()->read('Auth');
        if(isset($user) and $user['id_rol'] === 6)
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
        $citasentrenador = $this->paginate($this->Citasentrenador);

        $this->set(compact('citasentrenador'));
    }

    /**
     * View method
     *
     * @param string|null $id Citasentrenador id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $citasentrenador = $this->Citasentrenador->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('citasentrenador'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $citasentrenador = $this->Citasentrenador->newEmptyEntity();

        if ($this->request->is('post')) {
            //Buscamos los entrenadores disponibles con más horas libres y asignamos al usuario
            $this->loadModel("Entrenadores");
            $this->loadModel("Socios");
            $user = $this->request->getSession()->read('Auth');           

            //Cargamos los datos de entrenadores y socios para revisar que se pueda asignar
            $entrenadores_libres = $this->Entrenadores->find('all', ['conditions' => array('horas_libres >' => '0'), 
                                                                                     array('joins' => array(array('table' => 'users',
                                                                        'alias' => 'Usuarios',
                                                                        'type' => 'INNER',
                                                                        'conditions' => array('entrenadores.usuario = users.usuario', 'users.id_centro' => $user['id_centro'])))), 'order' => array('horas_libres ASC')])->toArray();
            $id = $entrenadores_libres[0]['id_entrenador'];

            $user = $this->request->getSession()->read('Auth');
            $socio = $this->Socios->find('all', ['conditions' => array('usuario' => $user['usuario'])])->toArray();     

            $fecha = $this->Citasentrenador->find('all', ['conditions' => array('id_socio' => $socio[0]['id_socio'], 'fecha' => ''.date('Y-m-d').'', 'id_entrenador' => $id, 'hora' => $_POST['hora'])])->toArray();            

            if($fecha)
            {
                $this->Flash->error(__('Ya tienes asignado un entrenador'));
                return $this->redirect(['action' => 'index']);
            }
            if(empty($entrenadores_libres)){
                $this->Flash->error(__('No hay entrenadores con horas libres disponibles'));
                return $this->redirect(['action' => 'index']);
            }                       

            $entrenador = $this->Entrenadores->get($id, [
                'contain' => [],
            ]);
            
            //Modificamos las horas libres y reservadas del entrenador, restando una a las libres y sumando una a las reservadas
                $entrenador = $this->Entrenadores->patchEntity($entrenador, $this->request->getData());            
                $entrenador['horas_libres'] = $entrenador['horas_libres'] - 1;
                $entrenador['horas_reservadas'] = $entrenador['horas_reservadas'] + 1;
                //Guardamos los cambios en la bbdd
                if ($this->Entrenadores->save($entrenador)) { 

                    $citasentrenador = $this->Citasentrenador->patchEntity($citasentrenador, $this->request->getData());
                    $citasentrenador['id_entrenador'] = $id;
                    $citasentrenador['id_socio'] = $socio[0]['id_socio'];

                    if ($this->Citasentrenador->save($citasentrenador)) {
                        $this->Flash->success(__('La cita se ha guardado correctamente'));

                        return $this->redirect(['controller' => 'principal', 'action' => 'solicitarEntrenador']);
                    }else{
                        $this->Flash->error(__('La cita no se ha podido guardar. Intentalo de nuevo.'));
                    }                    
                }
            }
            $this->set(compact('citasentrenador'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Citasentrenador id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $citasentrenador = $this->Citasentrenador->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $citasentrenador = $this->Citasentrenador->patchEntity($citasentrenador, $this->request->getData());
            if ($this->Citasentrenador->save($citasentrenador)) {
                $this->Flash->success(__('The citasentrenador has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The citasentrenador could not be saved. Please, try again.'));
        }
        $this->set(compact('citasentrenador'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Citasentrenador id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $citasentrenador = $this->Citasentrenador->get($id);
        if ($this->Citasentrenador->delete($citasentrenador)) {
            $this->Flash->success(__('The citasentrenador has been deleted.'));
        } else {
            $this->Flash->error(__('The citasentrenador could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
