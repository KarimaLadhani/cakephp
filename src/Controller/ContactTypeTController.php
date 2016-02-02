<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContactTypeT Controller
 *
 * @property \App\Model\Table\ContactTypeTTable $ContactTypeT
 */
class ContactTypeTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('contactTypeT', $this->paginate($this->ContactTypeT));
        $this->set('_serialize', ['contactTypeT']);
    }

    /**
     * View method
     *
     * @param string|null $id Contact Type T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactTypeT = $this->ContactTypeT->get($id, [
            'contain' => []
        ]);
        $this->set('contactTypeT', $contactTypeT);
        $this->set('_serialize', ['contactTypeT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactTypeT = $this->ContactTypeT->newEntity();
        if ($this->request->is('post')) {
            $contactTypeT = $this->ContactTypeT->patchEntity($contactTypeT, $this->request->data);
            if ($this->ContactTypeT->save($contactTypeT)) {
                $this->Flash->success('The contact type t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The contact type t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('contactTypeT'));
        $this->set('_serialize', ['contactTypeT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Type T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactTypeT = $this->ContactTypeT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactTypeT = $this->ContactTypeT->patchEntity($contactTypeT, $this->request->data);
            if ($this->ContactTypeT->save($contactTypeT)) {
                $this->Flash->success('The contact type t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The contact type t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('contactTypeT'));
        $this->set('_serialize', ['contactTypeT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact Type T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactTypeT = $this->ContactTypeT->get($id);
        if ($this->ContactTypeT->delete($contactTypeT)) {
            $this->Flash->success('The contact type t has been deleted.');
        } else {
            $this->Flash->error('The contact type t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
