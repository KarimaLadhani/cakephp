<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VolunteerActivityListT Controller
 *
 * @property \App\Model\Table\VolunteerActivityListTTable $VolunteerActivityListT
 */
class VolunteerActivityListTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('volunteerActivityListT', $this->paginate($this->VolunteerActivityListT));
        $this->set('_serialize', ['volunteerActivityListT']);
    }

    /**
     * View method
     *
     * @param string|null $id Volunteer Activity List T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $volunteerActivityListT = $this->VolunteerActivityListT->get($id, [
            'contain' => []
        ]);
        $this->set('volunteerActivityListT', $volunteerActivityListT);
        $this->set('_serialize', ['volunteerActivityListT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $volunteerActivityListT = $this->VolunteerActivityListT->newEntity();
        if ($this->request->is('post')) {
            $volunteerActivityListT = $this->VolunteerActivityListT->patchEntity($volunteerActivityListT, $this->request->data);
            if ($this->VolunteerActivityListT->save($volunteerActivityListT)) {
                $this->Flash->success('The volunteer activity list t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer activity list t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerActivityListT'));
        $this->set('_serialize', ['volunteerActivityListT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Volunteer Activity List T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $volunteerActivityListT = $this->VolunteerActivityListT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $volunteerActivityListT = $this->VolunteerActivityListT->patchEntity($volunteerActivityListT, $this->request->data);
            if ($this->VolunteerActivityListT->save($volunteerActivityListT)) {
                $this->Flash->success('The volunteer activity list t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer activity list t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerActivityListT'));
        $this->set('_serialize', ['volunteerActivityListT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Volunteer Activity List T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $volunteerActivityListT = $this->VolunteerActivityListT->get($id);
        if ($this->VolunteerActivityListT->delete($volunteerActivityListT)) {
            $this->Flash->success('The volunteer activity list t has been deleted.');
        } else {
            $this->Flash->error('The volunteer activity list t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
