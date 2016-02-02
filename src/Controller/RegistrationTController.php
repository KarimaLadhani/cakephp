<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RegistrationT Controller
 *
 * @property \App\Model\Table\RegistrationTTable $RegistrationT
 */
class RegistrationTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('registrationT', $this->paginate($this->RegistrationT));
        $this->set('_serialize', ['registrationT']);
    }

    /**
     * View method
     *
     * @param string|null $id Registration T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $registrationT = $this->RegistrationT->get($id, [
            'contain' => []
        ]);
        $this->set('registrationT', $registrationT);
        $this->set('_serialize', ['registrationT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $registrationT = $this->RegistrationT->newEntity();
        if ($this->request->is('post')) {
            $registrationT = $this->RegistrationT->patchEntity($registrationT, $this->request->data);
            if ($this->RegistrationT->save($registrationT)) {
                $this->Flash->success('The registration t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The registration t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('registrationT'));
        $this->set('_serialize', ['registrationT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Registration T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $registrationT = $this->RegistrationT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registrationT = $this->RegistrationT->patchEntity($registrationT, $this->request->data);
            if ($this->RegistrationT->save($registrationT)) {
                $this->Flash->success('The registration t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The registration t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('registrationT'));
        $this->set('_serialize', ['registrationT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Registration T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registrationT = $this->RegistrationT->get($id);
        if ($this->RegistrationT->delete($registrationT)) {
            $this->Flash->success('The registration t has been deleted.');
        } else {
            $this->Flash->error('The registration t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
