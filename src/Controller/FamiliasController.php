<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Familias Controller
 *
 * @property \App\Model\Table\FamiliasTable $Familias
 *
 * @method \App\Model\Entity\Familia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FamiliasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Canais']
        ];
        $familias = $this->paginate($this->Familias);

        $this->set(compact('familias'));
    }

    /**
     * View method
     *
     * @param string|null $id Familia id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $familia = $this->Familias->get($id, [
            'contain' => ['Canais', 'Metas']
        ]);

        $this->set('familia', $familia);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $familia = $this->Familias->newEntity();
        if ($this->request->is('post')) {
            $familia = $this->Familias->patchEntity($familia, $this->request->getData());
            if ($this->Familias->save($familia)) {
                $this->Flash->success(__('The familia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The familia could not be saved. Please, try again.'));
        }
        $canais = $this->Familias->Canais->find('list', ['limit' => 200]);
        $metas = $this->Familias->Metas->find('list', ['limit' => 200]);
        $this->set(compact('familia', 'canais', 'metas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Familia id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $familia = $this->Familias->get($id, [
            'contain' => ['Metas']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $familia = $this->Familias->patchEntity($familia, $this->request->getData());
            if ($this->Familias->save($familia)) {
                $this->Flash->success(__('The familia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The familia could not be saved. Please, try again.'));
        }
        $canais = $this->Familias->Canais->find('list', ['limit' => 200]);
        $metas = $this->Familias->Metas->find('list', ['limit' => 200]);
        $this->set(compact('familia', 'canais', 'metas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Familia id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $familia = $this->Familias->get($id);
        if ($this->Familias->delete($familia)) {
            $this->Flash->success(__('The familia has been deleted.'));
        } else {
            $this->Flash->error(__('The familia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
