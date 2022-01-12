<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tipoactividades Controller
 *
 * @property \App\Model\Table\TipoactividadesTable $Tipoactividades
 * @method \App\Model\Entity\Tipoactividade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TipoactividadesController extends AppController
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
        $tipoactividades = $this->paginate($this->Tipoactividades);

        $this->set(compact('tipoactividades'));
    }

    /**
     * View method
     *
     * @param string|null $id Tipoactividade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tipoactividade = $this->Tipoactividades->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('tipoactividade'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tipoactividade = $this->Tipoactividades->newEmptyEntity();
        if ($this->request->is('post')) {
            $tipoactividade = $this->Tipoactividades->patchEntity($tipoactividade, $this->request->getData());
            if ($this->Tipoactividades->save($tipoactividade)) {
                $this->Flash->success(__('The tipoactividade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipoactividade could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoactividade'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tipoactividade id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tipoactividade = $this->Tipoactividades->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tipoactividade = $this->Tipoactividades->patchEntity($tipoactividade, $this->request->getData());
            if ($this->Tipoactividades->save($tipoactividade)) {
                $this->Flash->success(__('The tipoactividade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tipoactividade could not be saved. Please, try again.'));
        }
        $this->set(compact('tipoactividade'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tipoactividade id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tipoactividade = $this->Tipoactividades->get($id);
        if ($this->Tipoactividades->delete($tipoactividade)) {
            $this->Flash->success(__('The tipoactividade has been deleted.'));
        } else {
            $this->Flash->error(__('The tipoactividade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
