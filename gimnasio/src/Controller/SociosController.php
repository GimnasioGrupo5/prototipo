<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Socios Controller
 *
 * @property \App\Model\Table\SociosTable $Socios
 * @method \App\Model\Entity\Socio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SociosController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $user = $this->request->getSession()->read('Auth');
        if(isset($user) && $user['id_rol'] === 1)
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
        $socios = $this->paginate($this->Socios);

        $this->set(compact('socios'));
    }

    /**
     * View method
     *
     * @param string|null $id Socio id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $socio = $this->Socios->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('socio'));
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

        //si no existe el usuario mediante metodo GET, enviamos al controlador user/add
        if(!isset($_GET['usuario'])){
            echo $this->redirect(['controller' => 'users', 'action' => 'add']);
        }

        $socio = $this->Socios->newEmptyEntity();
        if ($this->request->is('post')) {
            $socio = $this->Socios->patchEntity($socio, $this->request->getData());
            if ($this->Socios->save($socio)) {
                $this->Flash->success(__('The socio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The socio could not be saved. Please, try again.'));
        }
        $this->set(compact('socio'));
        $this->set(compact('lista_roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Socio id.
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

        $socio = $this->Socios->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $socio = $this->Socios->patchEntity($socio, $this->request->getData());
            if ($this->Socios->save($socio)) {
                $this->Flash->success(__('The socio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The socio could not be saved. Please, try again.'));
        }
        $this->set(compact('socio'));
        $this->set(compact('lista_roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Socio id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $socio = $this->Socios->get($id);
        if ($this->Socios->delete($socio)) {
            $this->Flash->success(__('The socio has been deleted.'));
        } else {
            $this->Flash->error(__('The socio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
