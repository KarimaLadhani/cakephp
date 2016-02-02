<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * VolunteerMaterialSentInfoT Controller
 *
 * @property \App\Model\Table\VolunteerMaterialSentInfoTTable $VolunteerMaterialSentInfoT
 */
class VolunteerMaterialSentInfoTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('volunteerMaterialSentInfoT', $this->paginate($this->VolunteerMaterialSentInfoT));
        $this->set('_serialize', ['volunteerMaterialSentInfoT']);
    }

    /**
     * View method
     *
     * @param string|null $id Volunteer Material Sent Info T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $volunteerMaterialSentInfoT = $this->VolunteerMaterialSentInfoT->get($id, [
            'contain' => []
        ]);
        $this->set('volunteerMaterialSentInfoT', $volunteerMaterialSentInfoT);
        $this->set('_serialize', ['volunteerMaterialSentInfoT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $volunteerMaterialSentInfoT = $this->VolunteerMaterialSentInfoT->newEntity();
        if ($this->request->is('post')) {
            $volunteerMaterialSentInfoT = $this->VolunteerMaterialSentInfoT->patchEntity($volunteerMaterialSentInfoT, $this->request->data);
            if ($this->VolunteerMaterialSentInfoT->save($volunteerMaterialSentInfoT)) {
                $this->Flash->success('The volunteer material sent info t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer material sent info t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerMaterialSentInfoT'));
        $this->set('_serialize', ['volunteerMaterialSentInfoT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Volunteer Material Sent Info T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $volunteerMaterialSentInfoT = $this->VolunteerMaterialSentInfoT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $volunteerMaterialSentInfoT = $this->VolunteerMaterialSentInfoT->patchEntity($volunteerMaterialSentInfoT, $this->request->data);
            if ($this->VolunteerMaterialSentInfoT->save($volunteerMaterialSentInfoT)) {
                $this->Flash->success('The volunteer material sent info t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The volunteer material sent info t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('volunteerMaterialSentInfoT'));
        $this->set('_serialize', ['volunteerMaterialSentInfoT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Volunteer Material Sent Info T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $volunteerMaterialSentInfoT = $this->VolunteerMaterialSentInfoT->get($id);
        if ($this->VolunteerMaterialSentInfoT->delete($volunteerMaterialSentInfoT)) {
            $this->Flash->success('The volunteer material sent info t has been deleted.');
        } else {
            $this->Flash->error('The volunteer material sent info t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
