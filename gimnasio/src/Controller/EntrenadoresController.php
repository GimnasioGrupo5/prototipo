<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Entrenadores Controller
 *
 * @property \App\Model\Table\EntrenadoresTable $Entrenadores
 * @method \App\Model\Entity\Entrenadore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EntrenadoresController extends AppController
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
        $entrenadores = $this->paginate($this->Entrenadores);

        $this->set(compact('entrenadores'));
    }

    /**
     * View method
     *
     * @param string|null $id Entrenadore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $entrenadore = $this->Entrenadores->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('entrenadore'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //Cargamos los registros de la tabla roles  
        $this->loadModel("Roles");
        $datos_rol = $this->Roles->find()->all()->toArray();
        $lista_roles;
        foreach($datos_rol as $rol){
            $lista_roles[$rol['id_rol']] = $rol["nombre"];
        }

        $entrenadore = $this->Entrenadores->newEmptyEntity();
        if ($this->request->is('post')) {
            $entrenadore = $this->Entrenadores->patchEntity($entrenadore, $this->request->getData());
            if ($this->Entrenadores->save($entrenadore)) {
                $this->Flash->success(__('The entrenadore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The entrenadore could not be saved. Please, try again.'));
        }
        $this->set(compact('entrenadore'));
        $this->set(compact('lista_roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Entrenadore id.
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

        $entrenadore = $this->Entrenadores->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $entrenadore = $this->Entrenadores->patchEntity($entrenadore, $this->request->getData());
            if ($this->Entrenadores->save($entrenadore)) {
                $this->Flash->success(__('The entrenadore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The entrenadore could not be saved. Please, try again.'));
        }
        $this->set(compact('entrenadore'));
        $this->set(compact('lista_roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Entrenadore id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entrenadore = $this->Entrenadores->get($id);
        if ($this->Entrenadores->delete($entrenadore)) {
            $this->Flash->success(__('The entrenadore has been deleted.'));
        } else {
            $this->Flash->error(__('The entrenadore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
