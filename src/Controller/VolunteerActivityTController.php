<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VolunteerActivityT Controller
 *
 * @property \App\Model\Table\VolunteerActivityTTable $VolunteerActivityT
 */
class VolunteerActivityTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('volunteerActivityT', $this->paginate($this->VolunteerActivityT));
        $this->set('_serialize', ['volunteerActivityT']);
    }

    /**
     * View method
     *
     * @param string|null $id Volunteer Activity T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $volunteerActivityT = $this->VolunteerActivityT->get($id, [
            'contain' => []
        ]);
        $this->set('volunteerActivityT', $volunteerActivityT);
        $this->set('_serialize', ['volunteerActivityT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $volunteerActivityT = $this->VolunteerActivityT->newEntity();
        if ($this->request->is('post')) {
            $volunteerActivityT = $this->VolunteerActivityT->patchEntity($volunteerActivityT, $this->request->data);
            if ($this->VolunteerActivityT->save($volunteerActivityT)) {
                $this->Flash->success('The volunteer activity t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer activity t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerActivityT'));
        $this->set('_serialize', ['volunteerActivityT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Volunteer Activity T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $volunteerActivityT = $this->VolunteerActivityT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $volunteerActivityT = $this->VolunteerActivityT->patchEntity($volunteerActivityT, $this->request->data);
            if ($this->VolunteerActivityT->save($volunteerActivityT)) {
                $this->Flash->success('The volunteer activity t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer activity t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerActivityT'));
        $this->set('_serialize', ['volunteerActivityT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Volunteer Activity T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $volunteerActivityT = $this->VolunteerActivityT->get($id);
        if ($this->VolunteerActivityT->delete($volunteerActivityT)) {
            $this->Flash->success('The volunteer activity t has been deleted.');
        } else {
            $this->Flash->error('The volunteer activity t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
