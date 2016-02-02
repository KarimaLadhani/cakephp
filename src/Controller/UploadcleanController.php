<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Uploadclean Controller
 *
 * @property \App\Model\Table\UploadcleanTable $Uploadclean
 */
class UploadcleanController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('uploadclean', $this->paginate($this->Uploadclean));
        $this->set('_serialize', ['uploadclean']);
    }

    /**
     * View method
     *
     * @param string|null $id Uploadclean id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $uploadclean = $this->Uploadclean->get($id, [
            'contain' => []
        ]);
        $this->set('uploadclean', $uploadclean);
        $this->set('_serialize', ['uploadclean']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $uploadclean = $this->Uploadclean->newEntity();
        if ($this->request->is('post')) {
            $uploadclean = $this->Uploadclean->patchEntity($uploadclean, $this->request->data);
            if ($this->Uploadclean->save($uploadclean)) {
                $this->Flash->success('The uploadclean has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The uploadclean could not be saved. Please, try again.');
            }
        }
        $this->set(compact('uploadclean'));
        $this->set('_serialize', ['uploadclean']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Uploadclean id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $uploadclean = $this->Uploadclean->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $uploadclean = $this->Uploadclean->patchEntity($uploadclean, $this->request->data);
            if ($this->Uploadclean->save($uploadclean)) {
                $this->Flash->success('The uploadclean has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The uploadclean could not be saved. Please, try again.');
            }
        }
        $this->set(compact('uploadclean'));
        $this->set('_serialize', ['uploadclean']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Uploadclean id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $uploadclean = $this->Uploadclean->get($id);
        if ($this->Uploadclean->delete($uploadclean)) {
            $this->Flash->success('The uploadclean has been deleted.');
        } else {
            $this->Flash->error('The uploadclean could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
