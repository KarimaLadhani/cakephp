<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StudentT Controller
 *
 * @property \App\Model\Table\StudentTTable $StudentT
 */
class StudentTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('studentT', $this->paginate($this->StudentT));
        $this->set('_serialize', ['studentT']);
    }

    /**
     * View method
     *
     * @param string|null $id Student T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentT = $this->StudentT->get($id, [
            'contain' => []
        ]);
        $this->set('studentT', $studentT);
        $this->set('_serialize', ['studentT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $studentT = $this->StudentT->newEntity();
        if ($this->request->is('post')) {
            $studentT = $this->StudentT->patchEntity($studentT, $this->request->data);
            if ($this->StudentT->save($studentT)) {
                $this->Flash->success('The student t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The student t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('studentT'));
        $this->set('_serialize', ['studentT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Student T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studentT = $this->StudentT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentT = $this->StudentT->patchEntity($studentT, $this->request->data);
            if ($this->StudentT->save($studentT)) {
                $this->Flash->success('The student t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The student t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('studentT'));
        $this->set('_serialize', ['studentT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Student T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studentT = $this->StudentT->get($id);
        if ($this->StudentT->delete($studentT)) {
            $this->Flash->success('The student t has been deleted.');
        } else {
            $this->Flash->error('The student t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
