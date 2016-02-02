<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VolunteerT Controller
 *
 * @property \App\Model\Table\VolunteerTTable $VolunteerT
 */
class VolunteerTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('volunteerT', $this->paginate($this->VolunteerT));
        $this->set('_serialize', ['volunteerT']);
    }

    /**
     * View method
     *
     * @param string|null $id Volunteer T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $volunteerT = $this->VolunteerT->get($id, [
            'contain' => []
        ]);
        $this->set('volunteerT', $volunteerT);
        $this->set('_serialize', ['volunteerT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $volunteerT = $this->VolunteerT->newEntity();
        if ($this->request->is('post')) {
            $volunteerT = $this->VolunteerT->patchEntity($volunteerT, $this->request->data);
            if ($this->VolunteerT->save($volunteerT)) {
                $this->Flash->success('The volunteer t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerT'));
        $this->set('_serialize', ['volunteerT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Volunteer T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $volunteerT = $this->VolunteerT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $volunteerT = $this->VolunteerT->patchEntity($volunteerT, $this->request->data);
            if ($this->VolunteerT->save($volunteerT)) {
                $this->Flash->success('The volunteer t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerT'));
        $this->set('_serialize', ['volunteerT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Volunteer T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $volunteerT = $this->VolunteerT->get($id);
        if ($this->VolunteerT->delete($volunteerT)) {
            $this->Flash->success('The volunteer t has been deleted.');
        } else {
            $this->Flash->error('The volunteer t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
