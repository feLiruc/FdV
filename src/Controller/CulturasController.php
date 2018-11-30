<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Culturas Controller
 *
 * @property \App\Model\Table\CulturasTable $Culturas
 *
 * @method \App\Model\Entity\Cultura[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CulturasController extends AppController
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
        $culturas = $this->paginate($this->Culturas);

        $this->set(compact('culturas'));
    }

    /**
     * View method
     *
     * @param string|null $id Cultura id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cultura = $this->Culturas->get($id, [
            'contain' => ['Canais', 'Metas']
        ]);

        $this->set('cultura', $cultura);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cultura = $this->Culturas->newEntity();
        if ($this->request->is('post')) {
            $cultura = $this->Culturas->patchEntity($cultura, $this->request->getData());
            if ($this->Culturas->save($cultura)) {
                $this->Flash->success(__('The cultura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cultura could not be saved. Please, try again.'));
        }
        $canais = $this->Culturas->Canais->find('list', ['limit' => 200]);
        $this->set(compact('cultura', 'canais'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cultura id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cultura = $this->Culturas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cultura = $this->Culturas->patchEntity($cultura, $this->request->getData());
            if ($this->Culturas->save($cultura)) {
                $this->Flash->success(__('The cultura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cultura could not be saved. Please, try again.'));
        }
        $canais = $this->Culturas->Canais->find('list', ['limit' => 200]);
        $this->set(compact('cultura', 'canais'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cultura id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cultura = $this->Culturas->get($id);
        if ($this->Culturas->delete($cultura)) {
            $this->Flash->success(__('The cultura has been deleted.'));
        } else {
            $this->Flash->error(__('The cultura could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
