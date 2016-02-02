<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VolunteerInterestT Controller
 *
 * @property \App\Model\Table\VolunteerInterestTTable $VolunteerInterestT
 */
class VolunteerInterestTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('volunteerInterestT', $this->paginate($this->VolunteerInterestT));
        $this->set('_serialize', ['volunteerInterestT']);
    }

    /**
     * View method
     *
     * @param string|null $id Volunteer Interest T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $volunteerInterestT = $this->VolunteerInterestT->get($id, [
            'contain' => []
        ]);
        $this->set('volunteerInterestT', $volunteerInterestT);
        $this->set('_serialize', ['volunteerInterestT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $volunteerInterestT = $this->VolunteerInterestT->newEntity();
        if ($this->request->is('post')) {
            $volunteerInterestT = $this->VolunteerInterestT->patchEntity($volunteerInterestT, $this->request->data);
            if ($this->VolunteerInterestT->save($volunteerInterestT)) {
                $this->Flash->success('The volunteer interest t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer interest t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerInterestT'));
        $this->set('_serialize', ['volunteerInterestT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Volunteer Interest T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $volunteerInterestT = $this->VolunteerInterestT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $volunteerInterestT = $this->VolunteerInterestT->patchEntity($volunteerInterestT, $this->request->data);
            if ($this->VolunteerInterestT->save($volunteerInterestT)) {
                $this->Flash->success('The volunteer interest t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer interest t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerInterestT'));
        $this->set('_serialize', ['volunteerInterestT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Volunteer Interest T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $volunteerInterestT = $this->VolunteerInterestT->get($id);
        if ($this->VolunteerInterestT->delete($volunteerInterestT)) {
            $this->Flash->success('The volunteer interest t has been deleted.');
        } else {
            $this->Flash->error('The volunteer interest t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
