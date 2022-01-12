<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Calendarioactividades Controller
 *
 * @property \App\Model\Table\CalendarioactividadesTable $Calendarioactividades
 * @method \App\Model\Entity\Calendarioactividade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CalendarioactividadesController extends AppController
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
        //Cargamos los modelos
        $this->loadModel("Tipoactividades");
        $datos_actividades = $this->Tipoactividades->find()->all()->toArray();
        $lista_actividades;
        foreach($datos_actividades as $actividad){
            $lista_actividades[$actividad['id_actividad']] = $actividad["nombre"];
        }

        $this->loadModel("Monitores");
        $datos_monitores = $this->Monitores->find()->all()->toArray();
        $lista_monitores;
        foreach($datos_monitores as $monitor){
            $lista_monitores[$monitor['id_monitor']] = $monitor["nombre"];
        }

        $this->loadModel("Salas");
        $datos_salas = $this->Salas->find()->all()->toArray();
        $lista_salas;
        foreach($datos_salas as $salas){
            $lista_salas[$salas['id_sala']] = $salas["nombre"];
        }

        $calendarioactividades = $this->paginate($this->Calendarioactividades);

        $this->set(compact('calendarioactividades'));
        $this->set(compact('lista_actividades'));
        $this->set(compact('lista_monitores'));
        $this->set(compact('lista_salas'));

    }

    /**
     * View method
     *
     * @param string|null $id Calendarioactividade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $calendarioactividade = $this->Calendarioactividades->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('calendarioactividade'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        //Cargamos los modelos
        $this->loadModel("Tipoactividades");
        $datos_actividad = $this->Tipoactividades->find()->all()->toArray();
        $lista_actividades;
        foreach($datos_actividad as $actividad){
            $lista_actividades[$actividad['id_actividad']] = $actividad["nombre"];
        }

        $this->loadModel("Monitores");
        $datos_monitores = $this->Monitores->find()->all()->toArray();
        $lista_monitores;
        foreach($datos_monitores as $monitor){
            $lista_monitores[$monitor['id_monitor']] = $monitor["nombre"];
        }

        $this->loadModel("Salas");
        $datos_salas = $this->Salas->find()->all()->toArray();
        $lista_salas;
        foreach($datos_salas as $salas){
            $lista_salas[$salas['id_sala']] = $salas["nombre"];
        }

        $calendarioactividade = $this->Calendarioactividades->newEmptyEntity();
        if ($this->request->is('post')) {
            $calendarioactividade = $this->Calendarioactividades->patchEntity($calendarioactividade, $this->request->getData());
            if ($this->Calendarioactividades->save($calendarioactividade)) {
                $this->Flash->success(__('The calendarioactividade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calendarioactividade could not be saved. Please, try again.'));
        }
        $this->set(compact('calendarioactividade'));
        $this->set(compact('lista_actividades'));
        $this->set(compact('lista_monitores'));
        $this->set(compact('lista_salas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Calendarioactividade id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        //Cargamos los modelos
        $this->loadModel("Tipoactividades");
        $datos_actividad = $this->Tipoactividades->find()->all()->toArray();
        $lista_actividades;
        foreach($datos_actividad as $actividad){
            $lista_actividades[$actividad['id_actividad']] = $actividad["nombre"];
        }

        $this->loadModel("Monitores");
        $datos_monitores = $this->Monitores->find()->all()->toArray();
        $lista_monitores;
        foreach($datos_monitores as $monitor){
            $lista_monitores[$monitor['id_monitor']] = $monitor["nombre"];
        }

        $this->loadModel("Salas");
        $datos_salas = $this->Salas->find()->all()->toArray();
        $lista_salas;
        foreach($datos_salas as $salas){
            $lista_salas[$salas['id_sala']] = $salas["nombre"];
        }
        $calendarioactividade = $this->Calendarioactividades->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $calendarioactividade = $this->Calendarioactividades->patchEntity($calendarioactividade, $this->request->getData());
            if ($this->Calendarioactividades->save($calendarioactividade)) {
                $this->Flash->success(__('The calendarioactividade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The calendarioactividade could not be saved. Please, try again.'));
        }
        $this->set(compact('calendarioactividade'));
        $this->set(compact('lista_actividades'));
        $this->set(compact('lista_monitores'));
        $this->set(compact('lista_salas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Calendarioactividade id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $calendarioactividade = $this->Calendarioactividades->get($id);
        if ($this->Calendarioactividades->delete($calendarioactividade)) {
            $this->Flash->success(__('The calendarioactividade has been deleted.'));
        } else {
            $this->Flash->error(__('The calendarioactividade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
