<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * MetasFamilias Controller
 *
 * @property \App\Model\Table\MetasFamiliasTable $MetasFamilias
 *
 * @method \App\Model\Entity\MetasFamilia[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MetasFamiliasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Metas', 'Familias']
        ];
        $metasFamilias = $this->paginate($this->MetasFamilias);

        $this->set(compact('metasFamilias'));
    }

    /**
     * View method
     *
     * @param string|null $id Metas Familia id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $metasFamilia = $this->MetasFamilias->get($id, [
            'contain' => ['Metas', 'Familias']
        ]);

        $this->set('metasFamilia', $metasFamilia);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $metasFamilia = $this->MetasFamilias->newEntity();
        if ($this->request->is('post')) {
            $metasFamilia = $this->MetasFamilias->patchEntity($metasFamilia, $this->request->getData());
            if ($this->MetasFamilias->save($metasFamilia)) {
                $this->Flash->success(__('The metas familia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The metas familia could not be saved. Please, try again.'));
        }
        $metas = $this->MetasFamilias->Metas->find('list', ['limit' => 200]);
        $familias = $this->MetasFamilias->Familias->find('list', ['limit' => 200]);
        $this->set(compact('metasFamilia', 'metas', 'familias'));
    }

    public function addAll($meta=null){
        if($meta!==null){
            if ($this->request->is('post')) {
                $metasFamilias = TableRegistry::get('MetasFamilias');
                foreach ($this->request->getData()['data'] as $key => $entity) {
                    $entity = $metasFamilias->newEntity($entity);
                    $metasFamilias->save($entity);
                }
                $this->Flash->success(__('The metas familia has been saved.'));
                return $this->redirect(['controller'=>'metas', 'action' => 'view', $meta]);
            }
        }else{

        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Metas Familia id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $metasFamilia = $this->MetasFamilias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $metasFamilia = $this->MetasFamilias->patchEntity($metasFamilia, $this->request->getData());
            if ($this->MetasFamilias->save($metasFamilia)) {
                $this->Flash->success(__('The metas familia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The metas familia could not be saved. Please, try again.'));
        }
        $metas = $this->MetasFamilaiwes->Metas->find('list', ['limit' => 200]);
        $familias = $this->MetasFamilias->Familias->find('list', ['limit' => 200]);
        $this->set(compact('metasFamilia', 'metas', 'familias'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Metas Familia id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $meta = null)
    {
        // $this->request->allowMethod(['post', 'delete']);
        $metasFamilia = $this->MetasFamilias->get($id);
        if ($this->MetasFamilias->delete($metasFamilia)) {
            $this->Flash->success(__('The metas familia has been deleted.'));
        } else {
            $this->Flash->error(__('The metas familia could not be deleted. Please, try again.'));
        }

        if($meta===null){
            return $this->redirect(['controller' => 'Metas', 'action' => 'index']);
        }else{
            return $this->redirect(['controller' => 'Metas', 'action' => 'view', $meta]);
        }

    }
}
