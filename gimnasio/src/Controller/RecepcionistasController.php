<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Recepcionistas Controller
 *
 * @property \App\Model\Table\RecepcionistasTable $Recepcionistas
 * @method \App\Model\Entity\Recepcionista[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RecepcionistasController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $user = $this->request->getSession()->read('Auth');
        if(isset($user) and $user['id_rol'] === 1 or isset($user) and $user['id_rol'] === 4)
        {
            $this->Auth->allow(array('view','edit','delete','add', 'logout'));
        }
    }    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $recepcionistas = $this->paginate($this->Recepcionistas);

        $this->set(compact('recepcionistas'));
    }

    /**
     * View method
     *
     * @param string|null $id Recepcionista id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recepcionista = $this->Recepcionistas->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('recepcionista'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //si no existe el usuario mediante metodo GET, enviamos al controlador user/add
        if(!isset($_GET['usuario'])){
            echo $this->redirect(['controller' => 'users', 'action' => 'add']);
        }

        //Cargamos los registros de la tabla roles  
        $this->loadModel("Roles");
        $datos_rol = $this->Roles->find()->all()->toArray();
        $lista_roles;
        foreach($datos_rol as $rol){
            $lista_roles[$rol['id_rol']] = $rol["nombre"];
        }

        $recepcionista = $this->Recepcionistas->newEmptyEntity();
        if ($this->request->is('post')) {
            $recepcionista = $this->Recepcionistas->patchEntity($recepcionista, $this->request->getData());
            if ($this->Recepcionistas->save($recepcionista)) {
                $this->Flash->success(__('The recepcionista has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recepcionista could not be saved. Please, try again.'));
        }
        $this->set(compact('recepcionista'));
        $this->set(compact('lista_roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Recepcionista id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //Cargamos los registros de la tabla roles  
        $this->loadModel("Roles");
        $datos_rol = $this->Roles->find()->all()->toArray();
        $lista_roles;
        foreach($datos_rol as $rol){
            $lista_roles[$rol['id_rol']] = $rol["nombre"];
        }

        $recepcionista = $this->Recepcionistas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recepcionista = $this->Recepcionistas->patchEntity($recepcionista, $this->request->getData());
            if ($this->Recepcionistas->save($recepcionista)) {
                $this->Flash->success(__('The recepcionista has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The recepcionista could not be saved. Please, try again.'));
        }
        $this->set(compact('recepcionista'));
        $this->set(compact('lista_roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Recepcionista id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recepcionista = $this->Recepcionistas->get($id);
        if ($this->Recepcionistas->delete($recepcionista)) {
            $this->Flash->success(__('The recepcionista has been deleted.'));
        } else {
            $this->Flash->error(__('The recepcionista could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
