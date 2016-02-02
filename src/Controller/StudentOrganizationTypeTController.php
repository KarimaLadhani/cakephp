<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StudentOrganizationTypeT Controller
 *
 * @property \App\Model\Table\StudentOrganizationTypeTTable $StudentOrganizationTypeT
 */
class StudentOrganizationTypeTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('studentOrganizationTypeT', $this->paginate($this->StudentOrganizationTypeT));
        $this->set('_serialize', ['studentOrganizationTypeT']);
    }

    /**
     * View method
     *
     * @param string|null $id Student Organization Type T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentOrganizationTypeT = $this->StudentOrganizationTypeT->get($id, [
            'contain' => []
        ]);
        $this->set('studentOrganizationTypeT', $studentOrganizationTypeT);
        $this->set('_serialize', ['studentOrganizationTypeT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $studentOrganizationTypeT = $this->StudentOrganizationTypeT->newEntity();
        if ($this->request->is('post')) {
            $studentOrganizationTypeT = $this->StudentOrganizationTypeT->patchEntity($studentOrganizationTypeT, $this->request->data);
            if ($this->StudentOrganizationTypeT->save($studentOrganizationTypeT)) {
                $this->Flash->success('The student organization type t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The student organization type t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('studentOrganizationTypeT'));
        $this->set('_serialize', ['studentOrganizationTypeT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Student Organization Type T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studentOrganizationTypeT = $this->StudentOrganizationTypeT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentOrganizationTypeT = $this->StudentOrganizationTypeT->patchEntity($studentOrganizationTypeT, $this->request->data);
            if ($this->StudentOrganizationTypeT->save($studentOrganizationTypeT)) {
                $this->Flash->success('The student organization type t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The student organization type t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('studentOrganizationTypeT'));
        $this->set('_serialize', ['studentOrganizationTypeT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Student Organization Type T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studentOrganizationTypeT = $this->StudentOrganizationTypeT->get($id);
        if ($this->StudentOrganizationTypeT->delete($studentOrganizationTypeT)) {
            $this->Flash->success('The student organization type t has been deleted.');
        } else {
            $this->Flash->error('The student organization type t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
