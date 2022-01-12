<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Monitores Controller
 *
 * @property \App\Model\Table\MonitoresTable $Monitores
 * @method \App\Model\Entity\Monitore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MonitoresController extends AppController
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
        $this->loadModel("Tipoactividades");
        $datos_actividades = $this->Tipoactividades->find()->all()->toArray();
        $lista_actividades;
        foreach($datos_actividades as $actividad){
            $lista_actividades[$actividad['id_actividad']] = $actividad["nombre"];
        }

        $monitores = $this->paginate($this->Monitores);

        $this->set(compact('monitores'));
        $this->set(compact('lista_actividades'));
    }

    /**
     * View method
     *
     * @param string|null $id Monitore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $monitore = $this->Monitores->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('monitore'));
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

        //Cargamos los registros de la tabla tipoactividades        
        $this->loadModel("Tipoactividades");
        $datos_actividades = $this->Tipoactividades->find()->all()->toArray();
        $lista_actividades;
        foreach($datos_actividades as $actividad){
            $lista_actividades[$actividad['id_actividad']] = $actividad["nombre"];
        }
        //Cargamos los registros de la tabla roles  
        $this->loadModel("Roles");
        $datos_rol = $this->Roles->find()->all()->toArray();
        $lista_roles;
        foreach($datos_rol as $rol){
            $lista_roles[$rol['id_rol']] = $rol["nombre"];
        }

        $monitore = $this->Monitores->newEmptyEntity();
        if ($this->request->is('post')) {
            $monitore = $this->Monitores->patchEntity($monitore, $this->request->getData());
            if ($this->Monitores->save($monitore)) {
                $this->Flash->success(__('The monitore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The monitore could not be saved. Please, try again.'));
        }
        $this->set(compact('monitore'));
        $this->set(compact('lista_roles'));
        $this->set(compact('lista_actividades'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Monitore id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //Cargamos los registros de la tabla tipoactividades        
        $this->loadModel("Tipoactividades");
        $datos_actividades = $this->Tipoactividades->find()->all()->toArray();
        $lista_actividades;
        foreach($datos_actividades as $actividad){
            $lista_actividades[$actividad['id_actividad']] = $actividad["nombre"];
        }

        //Cargamos los registros de la tabla roles  
        $this->loadModel("Roles");
        $datos_rol = $this->Roles->find()->all()->toArray();
        $lista_roles;
        foreach($datos_rol as $rol){
            $lista_roles[$rol['id_rol']] = $rol["nombre"];
        }

        $monitore = $this->Monitores->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $monitore = $this->Monitores->patchEntity($monitore, $this->request->getData());
            if ($this->Monitores->save($monitore)) {
                $this->Flash->success(__('The monitore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The monitore could not be saved. Please, try again.'));
        }
        $this->set(compact('monitore'));
        $this->set(compact('lista_actividades'));
        $this->set(compact('lista_roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Monitore id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $monitore = $this->Monitores->get($id);
        if ($this->Monitores->delete($monitore)) {
            $this->Flash->success(__('The monitore has been deleted.'));
        } else {
            $this->Flash->error(__('The monitore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
