<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VolunteerActivityTypeT Controller
 *
 * @property \App\Model\Table\VolunteerActivityTypeTTable $VolunteerActivityTypeT
 */
class VolunteerActivityTypeTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('volunteerActivityTypeT', $this->paginate($this->VolunteerActivityTypeT));
        $this->set('_serialize', ['volunteerActivityTypeT']);
    }

    /**
     * View method
     *
     * @param string|null $id Volunteer Activity Type T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $volunteerActivityTypeT = $this->VolunteerActivityTypeT->get($id, [
            'contain' => []
        ]);
        $this->set('volunteerActivityTypeT', $volunteerActivityTypeT);
        $this->set('_serialize', ['volunteerActivityTypeT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $volunteerActivityTypeT = $this->VolunteerActivityTypeT->newEntity();
        if ($this->request->is('post')) {
            $volunteerActivityTypeT = $this->VolunteerActivityTypeT->patchEntity($volunteerActivityTypeT, $this->request->data);
            if ($this->VolunteerActivityTypeT->save($volunteerActivityTypeT)) {
                $this->Flash->success('The volunteer activity type t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer activity type t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerActivityTypeT'));
        $this->set('_serialize', ['volunteerActivityTypeT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Volunteer Activity Type T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $volunteerActivityTypeT = $this->VolunteerActivityTypeT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $volunteerActivityTypeT = $this->VolunteerActivityTypeT->patchEntity($volunteerActivityTypeT, $this->request->data);
            if ($this->VolunteerActivityTypeT->save($volunteerActivityTypeT)) {
                $this->Flash->success('The volunteer activity type t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer activity type t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerActivityTypeT'));
        $this->set('_serialize', ['volunteerActivityTypeT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Volunteer Activity Type T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $volunteerActivityTypeT = $this->VolunteerActivityTypeT->get($id);
        if ($this->VolunteerActivityTypeT->delete($volunteerActivityTypeT)) {
            $this->Flash->success('The volunteer activity type t has been deleted.');
        } else {
            $this->Flash->error('The volunteer activity type t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
