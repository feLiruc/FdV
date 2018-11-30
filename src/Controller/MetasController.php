<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Metas Controller
 *
 * @property \App\Model\Table\MetasTable $Metas
 *
 * @method \App\Model\Entity\Meta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MetasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Canais', 'Culturas', 'MetasFamilias']
        ];
        $metas = $this->paginate($this->Metas);

        $this->set(compact('metas'));
    }

    /**
     * View method
     *
     * @param string|null $id Meta id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meta = $this->Metas->get($id, [
            'contain' => ['Canais', 'Culturas', 'Familias', 'MetasFamilias']
        ]);

        $this->set('meta', $meta);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meta = $this->Metas->newEntity();
        if ($this->request->is('post')) {
            $meta = $this->Metas->patchEntity($meta, $this->request->getData());
            $meta->canal_id = 1;
            if ($this->Metas->save($meta)) {
                $this->Flash->success(__('The meta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meta could not be saved. Please, try again.'));
        }
        // $canais = $this->Metas->Canais->find('list', ['limit' => 200]);
        $culturas = $this->Metas->Culturas->find('list', ['limit' => 200]);
        // $familias = $this->Metas->Familias->find('list', ['limit' => 200]);
        $this->set(compact('meta', 'canais', 'culturas', 'familias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Meta id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meta = $this->Metas->get($id, [
            'contain' => ['Familias']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $meta = $this->Metas->patchEntity($meta, $this->request->getData());
            if ($this->Metas->save($meta)) {
                $this->Flash->success(__('The meta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The meta could not be saved. Please, try again.'));
        }
        $canais = $this->Metas->Canais->find('list', ['limit' => 200]);
        $culturas = $this->Metas->Culturas->find('list', ['limit' => 200]);
        $familias = $this->Metas->Familias->find('list', ['limit' => 200]);
        $this->set(compact('meta', 'canais', 'culturas', 'familias'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Meta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meta = $this->Metas->get($id);
        if ($this->Metas->delete($meta)) {
            $this->Flash->success(__('The meta has been deleted.'));
        } else {
            $this->Flash->error(__('The meta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
