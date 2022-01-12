<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sociosserviciosadicionales Controller
 *
 * @property \App\Model\Table\SociosserviciosadicionalesTable $Sociosserviciosadicionales
 * @method \App\Model\Entity\Sociosserviciosadicionale[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SociosserviciosadicionalesController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $user = $this->request->getSession()->read('Auth');
        if(isset($user) and $user['id_rol'] === 6)
        {
         $this->Auth->allow(array('add', 'delete'));
        }
    }  
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $sociosserviciosadicionales = $this->paginate($this->Sociosserviciosadicionales);

        $this->set(compact('sociosserviciosadicionales'));
    }

    /**
     * View method
     *
     * @param string|null $id Sociosserviciosadicionale id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sociosserviciosadicionale = $this->Sociosserviciosadicionales->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('sociosserviciosadicionale'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id_servicio)
    {
        $this->loadModel('Serviciosadicionales');
        $servicio = $this->Serviciosadicionales->get($id_servicio, [
            'contain' => [],
        ]);

        $user = $this->request->getSession()->read('Auth');
        $this->loadModel('Socios');
        $socio = $this->Socios->find('all', ['conditions' => array('usuario' => $user['usuario'])])->toArray();

        $id_socio = $socio[0]['id_socio'];
        
        //Cargamos los servicios contratados por el socio para comprobar si ya está inscrito
        $this->loadModel("Sociosserviciosadicionales");
        $this->loadModel("Socios");
        $servicios_socio = $this->Sociosserviciosadicionales->find('all', ['conditions' => array('id_servicio' => $id_servicio, 'id_socio' => $id_socio)])->toArray();

        if(!empty($servicios_socio)){
            $this->Flash->error(__('Ya estás dado de alta en este servicio'));
            return $this->redirect(['controller' => 'principal', 'action' => 'serviciosAdicionales']);
        }


        $sociosserviciosadicionale = $this->Sociosserviciosadicionales->newEmptyEntity();
        if ($this->request->is('post')) {
            $sociosserviciosadicionale = $this->Sociosserviciosadicionales->patchEntity($sociosserviciosadicionale, $this->request->getData());
            if ($this->Sociosserviciosadicionales->save($sociosserviciosadicionale)) {
                $this->Flash->success(__('Se ha dado de alta en el servicio adicional'));

                return $this->redirect(['controller' => 'principal', 'action' => 'serviciosAdicionales']);
            }
            $this->Flash->error(__('Error al darse de alta'));
        }
        $this->set(compact('sociosserviciosadicionale'));
        $this->set(compact('servicio'));
        $this->set(compact('id_socio'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sociosserviciosadicionale id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sociosserviciosadicionale = $this->Sociosserviciosadicionales->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sociosserviciosadicionale = $this->Sociosserviciosadicionales->patchEntity($sociosserviciosadicionale, $this->request->getData());
            if ($this->Sociosserviciosadicionales->save($sociosserviciosadicionale)) {
                $this->Flash->success(__('The sociosserviciosadicionale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sociosserviciosadicionale could not be saved. Please, try again.'));
        }
        $this->set(compact('sociosserviciosadicionale'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sociosserviciosadicionale id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sociosserviciosadicionale = $this->Sociosserviciosadicionales->get($id);
        if ($this->Sociosserviciosadicionales->delete($sociosserviciosadicionale)) {
            $this->Flash->success(__('The sociosserviciosadicionale has been deleted.'));
        } else {
            $this->Flash->error(__('The sociosserviciosadicionale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['controller' => 'principal', 'action' => 'serviciosAdicionales']);
    }
}
