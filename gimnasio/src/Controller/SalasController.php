<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Salas Controller
 *
 * @property \App\Model\Table\SalasTable $Salas
 * @method \App\Model\Entity\Sala[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SalasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $salas = $this->paginate($this->Salas);

        $this->set(compact('salas'));
    }

    /**
     * View method
     *
     * @param string|null $id Sala id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sala = $this->Salas->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('sala'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sala = $this->Salas->newEmptyEntity();
        if ($this->request->is('post')) {
            $sala = $this->Salas->patchEntity($sala, $this->request->getData());
            if ($this->Salas->save($sala)) {
                $this->Flash->success(__('The sala has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sala could not be saved. Please, try again.'));
        }
        $this->set(compact('sala'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sala id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sala = $this->Salas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sala = $this->Salas->patchEntity($sala, $this->request->getData());
            if ($this->Salas->save($sala)) {
                $this->Flash->success(__('The sala has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sala could not be saved. Please, try again.'));
        }
        $this->set(compact('sala'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sala id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sala = $this->Salas->get($id);
        if ($this->Salas->delete($sala)) {
            $this->Flash->success(__('The sala has been deleted.'));
        } else {
            $this->Flash->error(__('The sala could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
