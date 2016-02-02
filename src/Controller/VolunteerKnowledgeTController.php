<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VolunteerKnowledgeT Controller
 *
 * @property \App\Model\Table\VolunteerKnowledgeTTable $VolunteerKnowledgeT
 */
class VolunteerKnowledgeTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('volunteerKnowledgeT', $this->paginate($this->VolunteerKnowledgeT));
        $this->set('_serialize', ['volunteerKnowledgeT']);
    }

    /**
     * View method
     *
     * @param string|null $id Volunteer Knowledge T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $volunteerKnowledgeT = $this->VolunteerKnowledgeT->get($id, [
            'contain' => []
        ]);
        $this->set('volunteerKnowledgeT', $volunteerKnowledgeT);
        $this->set('_serialize', ['volunteerKnowledgeT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $volunteerKnowledgeT = $this->VolunteerKnowledgeT->newEntity();
        if ($this->request->is('post')) {
            $volunteerKnowledgeT = $this->VolunteerKnowledgeT->patchEntity($volunteerKnowledgeT, $this->request->data);
            if ($this->VolunteerKnowledgeT->save($volunteerKnowledgeT)) {
                $this->Flash->success('The volunteer knowledge t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer knowledge t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerKnowledgeT'));
        $this->set('_serialize', ['volunteerKnowledgeT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Volunteer Knowledge T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $volunteerKnowledgeT = $this->VolunteerKnowledgeT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $volunteerKnowledgeT = $this->VolunteerKnowledgeT->patchEntity($volunteerKnowledgeT, $this->request->data);
            if ($this->VolunteerKnowledgeT->save($volunteerKnowledgeT)) {
                $this->Flash->success('The volunteer knowledge t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer knowledge t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerKnowledgeT'));
        $this->set('_serialize', ['volunteerKnowledgeT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Volunteer Knowledge T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $volunteerKnowledgeT = $this->VolunteerKnowledgeT->get($id);
        if ($this->VolunteerKnowledgeT->delete($volunteerKnowledgeT)) {
            $this->Flash->success('The volunteer knowledge t has been deleted.');
        } else {
            $this->Flash->error('The volunteer knowledge t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
