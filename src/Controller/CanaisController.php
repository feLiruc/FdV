<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Canais Controller
 *
 *
 * @method \App\Model\Entity\Canal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CanaisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $canais = $this->paginate($this->Canais);

        $this->set(compact('canais'));
    }

    /**
     * View method
     *
     * @param string|null $id Canal id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $canal = $this->Canais->get($id, [
            'contain' => []
        ]);

        $this->set('canal', $canal);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $canal = $this->Canais->newEntity();
        if ($this->request->is('post')) {
            $canal = $this->Canais->patchEntity($canal, $this->request->getData());
            if ($this->Canais->save($canal)) {
                $this->Flash->success(__('The canal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The canal could not be saved. Please, try again.'));
        }
        $this->set(compact('canal'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Canal id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $canal = $this->Canais->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $canal = $this->Canais->patchEntity($canal, $this->request->getData());
            if ($this->Canais->save($canal)) {
                $this->Flash->success(__('The canal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The canal could not be saved. Please, try again.'));
        }
        $this->set(compact('canal'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Canal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $canal = $this->Canais->get($id);
        if ($this->Canais->delete($canal)) {
            $this->Flash->success(__('The canal has been deleted.'));
        } else {
            $this->Flash->error(__('The canal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
