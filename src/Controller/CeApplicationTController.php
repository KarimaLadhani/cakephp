<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Log\Log;
use App\Model\Entity\CeApplicationT;
use App\Model\Entity\CepT;

/**
 * CeApplicationT Controller
 *
 * @property \App\Model\Table\CeApplicationTTable $CeApplicationT
 */
class CeApplicationTController extends AppController
{
    public $paginate = [
                      'limit' => 10,
    ];

    public function initialize(){
        parent::initialize();
        //$this->loadModel('ExaminationLocationT');
        $this->loadComponent('Paginator');
    }   
    
    
    
    public function beforeFilter(Event $event)
    {
        
    }
    
    /**
     * Index method
     *
     * @return void
     */

    public function index()
    {
        $this->set('ceApplicationT', $this->paginate($this->CeApplicationT));
        $this->set('_serialize', ['ceApplicationT']);
    }

    /**
     * View method
     *
     * @param string|null $id Ce Application T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ceApplicationT = $this->CeApplicationT->get($id, [
            'contain' => []
        ]);
        $this->set('ceApplicationT', $ceApplicationT);
        $this->set('_serialize', ['ceApplicationT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ceApplicationT = $this->CeApplicationT->newEntity();
        if ($this->request->is('post')) {
            $ceApplicationT = $this->CeApplicationT->patchEntity($ceApplicationT, $this->request->data);
            if ($this->CeApplicationT->save($ceApplicationT)) {
                $this->Flash->success('The ce application t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The ce application t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('ceApplicationT'));
        $this->set('_serialize', ['ceApplicationT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ce Application T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ceApplicationT = $this->CeApplicationT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ceApplicationT = $this->CeApplicationT->patchEntity($ceApplicationT, $this->request->data);
            if ($this->CeApplicationT->save($ceApplicationT)) {
                $this->Flash->success('The ce application t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The ce application t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('ceApplicationT'));
        $this->set('_serialize', ['ceApplicationT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ce Application T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ceApplicationT = $this->CeApplicationT->get($id);
        if ($this->CeApplicationT->delete($ceApplicationT)) {
            $this->Flash->success('The ce application t has been deleted.');
        } else {
            $this->Flash->error('The ce application t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    
    public function displayceapp()
    {
        $this->set('iusername',$this->Auth->user('Admin_Username'));
        $dbConn=$this->getDBConnector();
        $ceappModel = $this->CeApplicationT;
        $results=$ceappModel->displayceapp();  
        $this->set('results',$this->paginate($results));
    }
}

