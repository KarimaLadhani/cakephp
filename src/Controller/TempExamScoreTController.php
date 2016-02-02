<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TempExamScoreT Controller
 *
 * @property \App\Model\Table\TempExamScoreTTable $TempExamScoreT
 */
class TempExamScoreTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('tempExamScoreT', $this->paginate($this->TempExamScoreT));
        $this->set('_serialize', ['tempExamScoreT']);
    }

    /**
     * View method
     *
     * @param string|null $id Temp Exam Score T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tempExamScoreT = $this->TempExamScoreT->get($id, [
            'contain' => []
        ]);
        $this->set('tempExamScoreT', $tempExamScoreT);
        $this->set('_serialize', ['tempExamScoreT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tempExamScoreT = $this->TempExamScoreT->newEntity();
        if ($this->request->is('post')) {
            $tempExamScoreT = $this->TempExamScoreT->patchEntity($tempExamScoreT, $this->request->data);
            if ($this->TempExamScoreT->save($tempExamScoreT)) {
                $this->Flash->success('The temp exam score t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The temp exam score t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('tempExamScoreT'));
        $this->set('_serialize', ['tempExamScoreT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Temp Exam Score T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tempExamScoreT = $this->TempExamScoreT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tempExamScoreT = $this->TempExamScoreT->patchEntity($tempExamScoreT, $this->request->data);
            if ($this->TempExamScoreT->save($tempExamScoreT)) {
                $this->Flash->success('The temp exam score t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The temp exam score t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('tempExamScoreT'));
        $this->set('_serialize', ['tempExamScoreT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Temp Exam Score T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tempExamScoreT = $this->TempExamScoreT->get($id);
        if ($this->TempExamScoreT->delete($tempExamScoreT)) {
            $this->Flash->success('The temp exam score t has been deleted.');
        } else {
            $this->Flash->error('The temp exam score t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
