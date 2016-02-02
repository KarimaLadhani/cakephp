<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CeActivityT Controller
 *
 * @property \App\Model\Table\CeActivityTTable $CeActivityT
 */
class CeActivityTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */

    public function index()
    {
        $this->set('ceActivityT', $this->paginate($this->CeActivityT));
        $this->set('_serialize', ['ceActivityT']);
    }

    /**
     * View method
     *
     * @param string|null $id Ce Activity T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ceActivityT = $this->CeActivityT->get($id, [
            'contain' => []
        ]);
        $this->set('ceActivityT', $ceActivityT);
        $this->set('_serialize', ['ceActivityT']);
    }


    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ceActivityT = $this->CeActivityT->newEntity();
        if ($this->request->is('post')) {
            $ceActivityT = $this->CeActivityT->patchEntity($ceActivityT, $this->request->data);
            if ($this->CeActivityT->save($ceActivityT)) {
                $this->Flash->success('The ce activity t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The ce activity t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('ceActivityT'));
        $this->set('_serialize', ['ceActivityT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ce Activity T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ceActivityT = $this->CeActivityT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ceActivityT = $this->CeActivityT->patchEntity($ceActivityT, $this->request->data);
            if ($this->CeActivityT->save($ceActivityT)) {
                $this->Flash->success('The ce activity t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The ce activity t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('ceActivityT'));
        $this->set('_serialize', ['ceActivityT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ce Activity T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ceActivityT = $this->CeActivityT->get($id);
        if ($this->CeActivityT->delete($ceActivityT)) {
            $this->Flash->success('The ce activity t has been deleted.');
        } else {
            $this->Flash->error('The ce activity t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }


}
