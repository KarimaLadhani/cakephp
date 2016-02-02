<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PaymentCodeT Controller
 *
 * @property \App\Model\Table\PaymentCodeTTable $PaymentCodeT
 */
class PaymentCodeTController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('paymentCodeT', $this->paginate($this->PaymentCodeT));
        $this->set('_serialize', ['paymentCodeT']);
    }

    /**
     * View method
     *
     * @param string|null $id Payment Code T id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $paymentCodeT = $this->PaymentCodeT->get($id, [
            'contain' => []
        ]);
        $this->set('paymentCodeT', $paymentCodeT);
        $this->set('_serialize', ['paymentCodeT']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $paymentCodeT = $this->PaymentCodeT->newEntity();
        if ($this->request->is('post')) {
            $paymentCodeT = $this->PaymentCodeT->patchEntity($paymentCodeT, $this->request->data);
            if ($this->PaymentCodeT->save($paymentCodeT)) {
                $this->Flash->success('The payment code t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The payment code t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('paymentCodeT'));
        $this->set('_serialize', ['paymentCodeT']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Payment Code T id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $paymentCodeT = $this->PaymentCodeT->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $paymentCodeT = $this->PaymentCodeT->patchEntity($paymentCodeT, $this->request->data);
            if ($this->PaymentCodeT->save($paymentCodeT)) {
                $this->Flash->success('The payment code t has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The payment code t could not be saved. Please, try again.');
            }
        }
        $this->set(compact('paymentCodeT'));
        $this->set('_serialize', ['paymentCodeT']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Payment Code T id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $paymentCodeT = $this->PaymentCodeT->get($id);
        if ($this->PaymentCodeT->delete($paymentCodeT)) {
            $this->Flash->success('The payment code t has been deleted.');
        } else {
            $this->Flash->error('The payment code t could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
