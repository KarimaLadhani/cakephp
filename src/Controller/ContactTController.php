<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContactT Controller
 *
 * @property \App\Model\Table\ContactTTable $ContactT
 */
class ContactTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('contactT', $this->paginate($this->ContactT));
        $this->set('_serialize', ['contactT']);
    }

    /**
     * View method
     *
     * @param string|null $id Contact T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactT = $this->ContactT->get($id, [
            'contain' => []
        ]);
        $this->set('contactT', $contactT);
        $this->set('_serialize', ['contactT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactT = $this->ContactT->newEntity();
        if ($this->request->is('post')) {
            $contactT = $this->ContactT->patchEntity($contactT, $this->request->data);
            if ($this->ContactT->save($contactT)) {
                $this->Flash->success('The contact t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The contact t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('contactT'));
        $this->set('_serialize', ['contactT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactT = $this->ContactT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactT = $this->ContactT->patchEntity($contactT, $this->request->data);
            if ($this->ContactT->save($contactT)) {
                $this->Flash->success('The contact t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The contact t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('contactT'));
        $this->set('_serialize', ['contactT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactT = $this->ContactT->get($id);
        if ($this->ContactT->delete($contactT)) {
            $this->Flash->success('The contact t has been deleted.');
        } else {
            $this->Flash->error('The contact t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
