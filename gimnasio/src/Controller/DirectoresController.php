<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Directores Controller
 *
 * @property \App\Model\Table\DirectoresTable $Directores
 * @method \App\Model\Entity\Directore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DirectoresController extends AppController
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
        $directores = $this->paginate($this->Directores);

        $this->set(compact('directores'));
    }

    /**
     * View method
     *
     * @param string|null $id Directore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $directore = $this->Directores->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('directore'));
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
        $directore = $this->Directores->newEmptyEntity();
        if ($this->request->is('post')) {
            $directore = $this->Directores->patchEntity($directore, $this->request->getData());
            if ($this->Directores->save($directore)) {
                $this->Flash->success(__('The directore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The directore could not be saved. Please, try again.'));
        }
        $this->set(compact('directore'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Directore id.
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

        $directore = $this->Directores->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $directore = $this->Directores->patchEntity($directore, $this->request->getData());
            if ($this->Directores->save($directore)) {
                $this->Flash->success(__('The directore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The directore could not be saved. Please, try again.'));
        }
        $this->set(compact('directore'));
        $this->set(compact('lista_roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Directore id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $directore = $this->Directores->get($id);
        if ($this->Directores->delete($directore)) {
            $this->Flash->success(__('The directore has been deleted.'));
        } else {
            $this->Flash->error(__('The directore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
