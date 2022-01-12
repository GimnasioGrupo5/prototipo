<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Serviciosadicionales Controller
 *
 * @property \App\Model\Table\ServiciosadicionalesTable $Serviciosadicionales
 * @method \App\Model\Entity\Serviciosadicionale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ServiciosadicionalesController extends AppController
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
        //Cargamos los registros de la tabla roles  
        $this->loadModel("Centros");
        $datos_centro = $this->Centros->find()->all()->toArray();
        $lista_centros;
        foreach($datos_centro as $centro){
            $lista_centros[$centro['id_centro']] = $centro["nombre"];
        }

        $serviciosadicionales = $this->paginate($this->Serviciosadicionales);

        $this->set(compact('serviciosadicionales'));
        $this->set(compact('lista_centros'));
    }

    /**
     * View method
     *
     * @param string|null $id Serviciosadicionale id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        //Cargamos los registros de la tabla roles  
        $this->loadModel("Centros");
        $datos_centro = $this->Centros->find()->all()->toArray();
        $lista_centros;
        foreach($datos_centro as $centro){
            $lista_centros[$centro['id_centro']] = $centro["nombre"];
        }

        $serviciosadicionale = $this->Serviciosadicionales->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('serviciosadicionale'));        
        $this->set(compact('lista_centros'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //Cargamos los registros de la tabla roles  
        $this->loadModel("Centros");
        $datos_centro = $this->Centros->find()->all()->toArray();
        $lista_centros;
        foreach($datos_centro as $centro){
            $lista_centros[$centro['id_centro']] = $centro["nombre"];
        }

        $serviciosadicionale = $this->Serviciosadicionales->newEmptyEntity();
        if ($this->request->is('post')) {
            $serviciosadicionale = $this->Serviciosadicionales->patchEntity($serviciosadicionale, $this->request->getData());
            if ($this->Serviciosadicionales->save($serviciosadicionale)) {
                $this->Flash->success(__('The serviciosadicionale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The serviciosadicionale could not be saved. Please, try again.'));
        }
        $this->set(compact('serviciosadicionale'));
        $this->set(compact('lista_centros'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Serviciosadicionale id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //Cargamos los registros de la tabla roles  
        $this->loadModel("Centros");
        $datos_centro = $this->Centros->find()->all()->toArray();
        $lista_centros;
        foreach($datos_centro as $centro){
            $lista_centros[$centro['id_centro']] = $centro["nombre"];
        }

        $serviciosadicionale = $this->Serviciosadicionales->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $serviciosadicionale = $this->Serviciosadicionales->patchEntity($serviciosadicionale, $this->request->getData());
            if ($this->Serviciosadicionales->save($serviciosadicionale)) {
                $this->Flash->success(__('The serviciosadicionale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The serviciosadicionale could not be saved. Please, try again.'));
        }
        $this->set(compact('serviciosadicionale'));
        $this->set(compact('lista_centros'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Serviciosadicionale id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $serviciosadicionale = $this->Serviciosadicionales->get($id);
        if ($this->Serviciosadicionales->delete($serviciosadicionale)) {
            $this->Flash->success(__('The serviciosadicionale has been deleted.'));
        } else {
            $this->Flash->error(__('The serviciosadicionale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
