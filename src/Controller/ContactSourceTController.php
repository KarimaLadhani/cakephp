<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContactSourceT Controller
 *
 * @property \App\Model\Table\ContactSourceTTable $ContactSourceT
 */
class ContactSourceTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('contactSourceT', $this->paginate($this->ContactSourceT));
        $this->set('_serialize', ['contactSourceT']);
    }

    /**
     * View method
     *
     * @param string|null $id Contact Source T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactSourceT = $this->ContactSourceT->get($id, [
            'contain' => []
        ]);
        $this->set('contactSourceT', $contactSourceT);
        $this->set('_serialize', ['contactSourceT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactSourceT = $this->ContactSourceT->newEntity();
        if ($this->request->is('post')) {
            $contactSourceT = $this->ContactSourceT->patchEntity($contactSourceT, $this->request->data);
            if ($this->ContactSourceT->save($contactSourceT)) {
                $this->Flash->success('The contact source t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The contact source t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('contactSourceT'));
        $this->set('_serialize', ['contactSourceT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Source T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactSourceT = $this->ContactSourceT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactSourceT = $this->ContactSourceT->patchEntity($contactSourceT, $this->request->data);
            if ($this->ContactSourceT->save($contactSourceT)) {
                $this->Flash->success('The contact source t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The contact source t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('contactSourceT'));
        $this->set('_serialize', ['contactSourceT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact Source T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactSourceT = $this->ContactSourceT->get($id);
        if ($this->ContactSourceT->delete($contactSourceT)) {
            $this->Flash->success('The contact source t has been deleted.');
        } else {
            $this->Flash->error('The contact source t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
