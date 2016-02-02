<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ExaminationLocationT Controller
 *
 * @property \App\Model\Table\ExaminationLocationTTable $ExaminationLocationT
 */
class ExaminationLocationTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('examinationLocationT', $this->paginate($this->ExaminationLocationT));
        $this->set('_serialize', ['examinationLocationT']);
    }

    /**
     * View method
     *
     * @param string|null $id Examination Location T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examinationLocationT = $this->ExaminationLocationT->get($id, [
            'contain' => []
        ]);
        $this->set('examinationLocationT', $examinationLocationT);
        $this->set('_serialize', ['examinationLocationT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examinationLocationT = $this->ExaminationLocationT->newEntity();
        if ($this->request->is('post')) {
            $examinationLocationT = $this->ExaminationLocationT->patchEntity($examinationLocationT, $this->request->data);
            if ($this->ExaminationLocationT->save($examinationLocationT)) {
                $this->Flash->success('The examination location t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The examination location t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('examinationLocationT'));
        $this->set('_serialize', ['examinationLocationT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Examination Location T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examinationLocationT = $this->ExaminationLocationT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examinationLocationT = $this->ExaminationLocationT->patchEntity($examinationLocationT, $this->request->data);
            if ($this->ExaminationLocationT->save($examinationLocationT)) {
                $this->Flash->success('The examination location t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The examination location t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('examinationLocationT'));
        $this->set('_serialize', ['examinationLocationT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Examination Location T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examinationLocationT = $this->ExaminationLocationT->get($id);
        if ($this->ExaminationLocationT->delete($examinationLocationT)) {
            $this->Flash->success('The examination location t has been deleted.');
        } else {
            $this->Flash->error('The examination location t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
