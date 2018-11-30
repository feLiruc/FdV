<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Metas Controller
 *
 * @property \App\Model\Table\MetasTable $Metas
 *
 * @method \App\Model\Entity\Meta[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ApiController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function getFamilias()
    {
    	$content = json_encode(TableRegistry::get('familias')->find()->toArray());
        $this->response->getBody()->write($content);
        $this->response = $this->response->withType('json');
        return $this->response;

        die();
    }

}