<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Uploadregdate Controller
 *
 * @property \App\Model\Table\UploadregdateTable $Uploadregdate
 */
class UploadregdateController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('uploadregdate', $this->paginate($this->Uploadregdate));
        $this->set('_serialize', ['uploadregdate']);
    }

    /**
     * View method
     *
     * @param string|null $id Uploadregdate id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $uploadregdate = $this->Uploadregdate->get($id, [
            'contain' => []
        ]);
        $this->set('uploadregdate', $uploadregdate);
        $this->set('_serialize', ['uploadregdate']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $uploadregdate = $this->Uploadregdate->newEntity();
        if ($this->request->is('post')) {
            $uploadregdate = $this->Uploadregdate->patchEntity($uploadregdate, $this->request->data);
            if ($this->Uploadregdate->save($uploadregdate)) {
                $this->Flash->success('The uploadregdate has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The uploadregdate could not be saved. Please, try again.');
            }
        }
        $this->set(compact('uploadregdate'));
        $this->set('_serialize', ['uploadregdate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Uploadregdate id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $uploadregdate = $this->Uploadregdate->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $uploadregdate = $this->Uploadregdate->patchEntity($uploadregdate, $this->request->data);
            if ($this->Uploadregdate->save($uploadregdate)) {
                $this->Flash->success('The uploadregdate has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The uploadregdate could not be saved. Please, try again.');
            }
        }
        $this->set(compact('uploadregdate'));
        $this->set('_serialize', ['uploadregdate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Uploadregdate id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $uploadregdate = $this->Uploadregdate->get($id);
        if ($this->Uploadregdate->delete($uploadregdate)) {
            $this->Flash->success('The uploadregdate has been deleted.');
        } else {
            $this->Flash->error('The uploadregdate could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
