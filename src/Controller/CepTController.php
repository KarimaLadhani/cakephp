<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CepT Controller
 *
 * @property \App\Model\Table\CepTTable $CepT
 */
class CepTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('cepT', $this->paginate($this->CepT));
        $this->set('_serialize', ['cepT']);
    }

    /**
     * View method
     *
     * @param string|null $id Cep T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cepT = $this->CepT->get($id, [
            'contain' => []
        ]);
        $this->set('cepT', $cepT);
        $this->set('_serialize', ['cepT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cepT = $this->CepT->newEntity();
        if ($this->request->is('post')) {
            $cepT = $this->CepT->patchEntity($cepT, $this->request->data);
            if ($this->CepT->save($cepT)) {
                $this->Flash->success('The cep t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The cep t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('cepT'));
        $this->set('_serialize', ['cepT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Cep T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cepT = $this->CepT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cepT = $this->CepT->patchEntity($cepT, $this->request->data);
            if ($this->CepT->save($cepT)) {
                $this->Flash->success('The cep t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The cep t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('cepT'));
        $this->set('_serialize', ['cepT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Cep T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cepT = $this->CepT->get($id);
        if ($this->CepT->delete($cepT)) {
            $this->Flash->success('The cep t has been deleted.');
        } else {
            $this->Flash->error('The cep t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
