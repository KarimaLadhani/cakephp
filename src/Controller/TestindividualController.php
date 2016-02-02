<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Testindividual Controller
 *
 * @property \App\Model\Table\TestindividualTable $Testindividual
 */
class TestindividualController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('testindividual', $this->paginate($this->Testindividual));
        $this->set('_serialize', ['testindividual']);
    }

    /**
     * View method
     *
     * @param string|null $id Testindividual id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $testindividual = $this->Testindividual->get($id, [
            'contain' => []
        ]);
        $this->set('testindividual', $testindividual);
        $this->set('_serialize', ['testindividual']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testindividual = $this->Testindividual->newEntity();
        if ($this->request->is('post')) {
            $testindividual = $this->Testindividual->patchEntity($testindividual, $this->request->data);
            if ($this->Testindividual->save($testindividual)) {
                $this->Flash->success('The testindividual has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The testindividual could not be saved. Please, try again.');
            }
        }
        $this->set(compact('testindividual'));
        $this->set('_serialize', ['testindividual']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Testindividual id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $testindividual = $this->Testindividual->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testindividual = $this->Testindividual->patchEntity($testindividual, $this->request->data);
            if ($this->Testindividual->save($testindividual)) {
                $this->Flash->success('The testindividual has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The testindividual could not be saved. Please, try again.');
            }
        }
        $this->set(compact('testindividual'));
        $this->set('_serialize', ['testindividual']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Testindividual id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testindividual = $this->Testindividual->get($id);
        if ($this->Testindividual->delete($testindividual)) {
            $this->Flash->success('The testindividual has been deleted.');
        } else {
            $this->Flash->error('The testindividual could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
