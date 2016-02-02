<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VolunteerApplicationT Controller
 *
 * @property \App\Model\Table\VolunteerApplicationTTable $VolunteerApplicationT
 */
class VolunteerApplicationTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('volunteerApplicationT', $this->paginate($this->VolunteerApplicationT));
        $this->set('_serialize', ['volunteerApplicationT']);
    }

    /**
     * View method
     *
     * @param string|null $id Volunteer Application T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $volunteerApplicationT = $this->VolunteerApplicationT->get($id, [
            'contain' => []
        ]);
        $this->set('volunteerApplicationT', $volunteerApplicationT);
        $this->set('_serialize', ['volunteerApplicationT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $volunteerApplicationT = $this->VolunteerApplicationT->newEntity();
        if ($this->request->is('post')) {
            $volunteerApplicationT = $this->VolunteerApplicationT->patchEntity($volunteerApplicationT, $this->request->data);
            if ($this->VolunteerApplicationT->save($volunteerApplicationT)) {
                $this->Flash->success('The volunteer application t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer application t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerApplicationT'));
        $this->set('_serialize', ['volunteerApplicationT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Volunteer Application T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $volunteerApplicationT = $this->VolunteerApplicationT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $volunteerApplicationT = $this->VolunteerApplicationT->patchEntity($volunteerApplicationT, $this->request->data);
            if ($this->VolunteerApplicationT->save($volunteerApplicationT)) {
                $this->Flash->success('The volunteer application t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer application t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerApplicationT'));
        $this->set('_serialize', ['volunteerApplicationT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Volunteer Application T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $volunteerApplicationT = $this->VolunteerApplicationT->get($id);
        if ($this->VolunteerApplicationT->delete($volunteerApplicationT)) {
            $this->Flash->success('The volunteer application t has been deleted.');
        } else {
            $this->Flash->error('The volunteer application t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
