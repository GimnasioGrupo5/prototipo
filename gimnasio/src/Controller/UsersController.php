<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $user = $this->request->getSession()->read('Auth');
        if(isset($user) and $user['id_rol'] === 1 or isset($user) and $user['id_rol'] === 4)
        {
            $this->Auth->allow(array('view','edit','delete','add', 'logout', 'editUser'));
        }
        else{
            $this->Auth->allow(array('logout'));
        }
    }    

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel("Roles");
        $datos_rol = $this->Roles->find()->all()->toArray();
        $lista_roles;
        foreach($datos_rol as $rol){
            $lista_roles[$rol['id_rol']] = $rol["nombre"];
        }
        
        $this->loadModel("Centros");
        $datos_centro = $this->Centros->find()->all()->toArray();
        $lista_centros;
        foreach($datos_centro as $centro){
            $lista_centros[$centro['id_centro']] = $centro["nombre"];
        }


        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $user = $this->Users->patchEntity($user, $this->request->getData());
                
                
                $rol = $user['id_rol'];
                switch($rol)
                {
                    case 1: $letra = "D"; break;
                    case 2: $letra = "M"; break;
                    case 3: $letra = "E"; break;
                    case 4: $letra = "R"; break;
                    case 5: $letra = "L"; break;
                    case 6: $letra = "S"; break;
                }

                $user['usuario'] = "SSC-".$user['id_usuario']."-".$letra;

                $this->Users->save($user);

                $this->Flash->success(__('The user has been saved.'));
                print_r($user);
                $usuario = $user['usuario'];
                
                switch($rol)
                {
                    case 1: $this->redirect('/directores/add?usuario='.$usuario.'&id_rol='.$rol); break;
                    case 2: $this->redirect('/monitores/add?usuario='.$usuario.'&id_rol='.$rol); break;
                    case 3: $this->redirect('/entrenadores/add?usuario='.$usuario.'&id_rol='.$rol); break;
                    case 4: $this->redirect('/recepcionistas/add?usuario='.$usuario.'&id_rol='.$rol); break;
                    case 5: $this->redirect('/limpiadores/add?usuario='.$usuario.'&id_rol='.$rol); break;
                    case 6: $this->redirect('/socios/add?usuario='.$usuario.'&id_rol='.$rol); break;
                }
                
            }else{
                $this->Flash->error(__('El usuario no ha podido guardarse. Vuelva a intentarlo'));
            }
            
        }
        $this->set(compact('user'));
        $this->set(compact('lista_roles'));
        $this->set(compact('lista_centros'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->loadModel("Roles");
        $datos_rol = $this->Roles->find()->all()->toArray();
        $lista_roles;
        foreach($datos_rol as $rol){
            $lista_roles[$rol['id_rol']] = $rol["nombre"];
        }
        
        $this->loadModel("Centros");
        $datos_centro = $this->Centros->find()->all()->toArray();
        $lista_centros;
        foreach($datos_centro as $centro){
            $lista_centros[$centro['id_centro']] = $centro["nombre"];
        }

        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $rol = $user['id_rol'];
                switch($rol)
                {
                    case 1: $this->redirect('/directores/index'); break;
                    case 2: $this->redirect('/monitores/index'); break;
                    case 3: $this->redirect('/entrenadores/index'); break;
                    case 4: $this->redirect('/recepcionistas/index'); break;
                    case 5: $this->redirect('/limpiadores/index'); break;
                    case 6: $this->redirect('/socios/index'); break;
                }
            }else{
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            
        }
        $this->set(compact('user'));
        $this->set(compact('lista_roles'));
        $this->set(compact('lista_centros'));
    }


    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //funcion de login
    public function login()
    {
        $result = $this->Authentication->getResult();
        // If the user is logged in send them away.
        if ($result->isValid()) {
            return $this->redirect(['controller' => 'Principal', 'action' => 'index']);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error('Invalid username or password');
        }
    }

    public function logout()
    {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'users', 'action' => 'login']);
    }    

}
