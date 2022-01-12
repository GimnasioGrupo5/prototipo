<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Limpiadores Controller
 *
 * @property \App\Model\Table\LimpiadoresTable $Limpiadores
 * @method \App\Model\Entity\Limpiadore[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LimpiadoresController extends AppController
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
        $limpiadores = $this->paginate($this->Limpiadores);

        $this->set(compact('limpiadores'));
    }

    /**
     * View method
     *
     * @param string|null $id Limpiadore id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $limpiadore = $this->Limpiadores->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('limpiadore'));
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

        $limpiadore = $this->Limpiadores->newEmptyEntity();
        if ($this->request->is('post')) {
            $limpiadore = $this->Limpiadores->patchEntity($limpiadore, $this->request->getData());
            if ($this->Limpiadores->save($limpiadore)) {
                $this->Flash->success(__('The limpiadore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The limpiadore could not be saved. Please, try again.'));
        }
        $this->set(compact('limpiadore'));
        $this->set(compact('lista_roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Limpiadore id.
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

        $limpiadore = $this->Limpiadores->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $limpiadore = $this->Limpiadores->patchEntity($limpiadore, $this->request->getData());
            if ($this->Limpiadores->save($limpiadore)) {
                $this->Flash->success(__('The limpiadore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The limpiadore could not be saved. Please, try again.'));
        }
        $this->set(compact('limpiadore'));
        $this->set(compact('lista_roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Limpiadore id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $limpiadore = $this->Limpiadores->get($id);
        if ($this->Limpiadores->delete($limpiadore)) {
            $this->Flash->success(__('The limpiadore has been deleted.'));
        } else {
            $this->Flash->error(__('The limpiadore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
