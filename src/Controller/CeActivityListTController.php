<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CeActivityListT Controller
 *
 * @property \App\Model\Table\CeActivityListTTable $CeActivityListT
 */
class CeActivityListTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('ceActivityListT', $this->paginate($this->CeActivityListT));
        $this->set('_serialize', ['ceActivityListT']);
    }

    /**
     * View method
     *
     * @param string|null $id Ce Activity List T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ceActivityListT = $this->CeActivityListT->get($id, [
            'contain' => []
        ]);
        $this->set('ceActivityListT', $ceActivityListT);
        $this->set('_serialize', ['ceActivityListT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ceActivityListT = $this->CeActivityListT->newEntity();
        if ($this->request->is('post')) {
            $ceActivityListT = $this->CeActivityListT->patchEntity($ceActivityListT, $this->request->data);
            if ($this->CeActivityListT->save($ceActivityListT)) {
                $this->Flash->success('The ce activity list t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The ce activity list t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('ceActivityListT'));
        $this->set('_serialize', ['ceActivityListT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ce Activity List T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ceActivityListT = $this->CeActivityListT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ceActivityListT = $this->CeActivityListT->patchEntity($ceActivityListT, $this->request->data);
            if ($this->CeActivityListT->save($ceActivityListT)) {
                $this->Flash->success('The ce activity list t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The ce activity list t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('ceActivityListT'));
        $this->set('_serialize', ['ceActivityListT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ce Activity List T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ceActivityListT = $this->CeActivityListT->get($id);
        if ($this->CeActivityListT->delete($ceActivityListT)) {
            $this->Flash->success('The ce activity list t has been deleted.');
        } else {
            $this->Flash->error('The ce activity list t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
