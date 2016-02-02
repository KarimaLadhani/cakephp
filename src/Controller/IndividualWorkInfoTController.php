<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * IndividualWorkInfoT Controller
 *
 * @property \App\Model\Table\IndividualWorkInfoTTable $IndividualWorkInfoT
 */
class IndividualWorkInfoTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('individualWorkInfoT', $this->paginate($this->IndividualWorkInfoT));
        $this->set('_serialize', ['individualWorkInfoT']);
    }

    /**
     * View method
     *
     * @param string|null $id Individual Work Info T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $individualWorkInfoT = $this->IndividualWorkInfoT->get($id, [
            'contain' => []
        ]);
        $this->set('individualWorkInfoT', $individualWorkInfoT);
        $this->set('_serialize', ['individualWorkInfoT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $individualWorkInfoT = $this->IndividualWorkInfoT->newEntity();
        if ($this->request->is('post')) {
            $individualWorkInfoT = $this->IndividualWorkInfoT->patchEntity($individualWorkInfoT, $this->request->data);
            if ($this->IndividualWorkInfoT->save($individualWorkInfoT)) {
                $this->Flash->success('The individual work info t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The individual work info t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('individualWorkInfoT'));
        $this->set('_serialize', ['individualWorkInfoT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Individual Work Info T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $individualWorkInfoT = $this->IndividualWorkInfoT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $individualWorkInfoT = $this->IndividualWorkInfoT->patchEntity($individualWorkInfoT, $this->request->data);
            if ($this->IndividualWorkInfoT->save($individualWorkInfoT)) {
                $this->Flash->success('The individual work info t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The individual work info t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('individualWorkInfoT'));
        $this->set('_serialize', ['individualWorkInfoT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Individual Work Info T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)	
    {
        $this->request->allowMethod(['post', 'delete']);
        $individualWorkInfoT = $this->IndividualWorkInfoT->get($id);
        if ($this->IndividualWorkInfoT->delete($individualWorkInfoT)) {
            $this->Flash->success('The individual work info t has been deleted.');
        } else {
            $this->Flash->error('The individual work info t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
    
    
    
    
    
    
    
}
