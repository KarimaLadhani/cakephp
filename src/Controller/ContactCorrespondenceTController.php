<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ContactCorrespondenceT Controller
 *
 * @property \App\Model\Table\ContactCorrespondenceTTable $ContactCorrespondenceT
 */
class ContactCorrespondenceTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('contactCorrespondenceT', $this->paginate($this->ContactCorrespondenceT));
        $this->set('_serialize', ['contactCorrespondenceT']);
    }

    /**
     * View method
     *
     * @param string|null $id Contact Correspondence T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contactCorrespondenceT = $this->ContactCorrespondenceT->get($id, [
            'contain' => []
        ]);
        $this->set('contactCorrespondenceT', $contactCorrespondenceT);
        $this->set('_serialize', ['contactCorrespondenceT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contactCorrespondenceT = $this->ContactCorrespondenceT->newEntity();
        if ($this->request->is('post')) {
            $contactCorrespondenceT = $this->ContactCorrespondenceT->patchEntity($contactCorrespondenceT, $this->request->data);
            if ($this->ContactCorrespondenceT->save($contactCorrespondenceT)) {
                $this->Flash->success('The contact correspondence t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The contact correspondence t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('contactCorrespondenceT'));
        $this->set('_serialize', ['contactCorrespondenceT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact Correspondence T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contactCorrespondenceT = $this->ContactCorrespondenceT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contactCorrespondenceT = $this->ContactCorrespondenceT->patchEntity($contactCorrespondenceT, $this->request->data);
            if ($this->ContactCorrespondenceT->save($contactCorrespondenceT)) {
                $this->Flash->success('The contact correspondence t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The contact correspondence t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('contactCorrespondenceT'));
        $this->set('_serialize', ['contactCorrespondenceT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact Correspondence T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contactCorrespondenceT = $this->ContactCorrespondenceT->get($id);
        if ($this->ContactCorrespondenceT->delete($contactCorrespondenceT)) {
            $this->Flash->success('The contact correspondence t has been deleted.');
        } else {
            $this->Flash->error('The contact correspondence t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
