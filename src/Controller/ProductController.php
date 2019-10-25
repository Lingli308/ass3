<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Product;
use App\Model\Table\ProductTable;

/**
 * Product Controller
 *
 * @property \App\Model\Table\ProductTable $Product
 *
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Category'],
            'order' => ['p_name asc']
        ];


        $product = $this->paginate($this->Product);

        $this->set(compact('product'));

//        $category = $this->Product->Category->find('all');
//        $this->set('category', $category);


    }

    public function search()
    {
        if ($this->request->getData('country_of_origin') != ''
            && $this->request->getData('price') != ''
            && $this->request->getData('category') != '')
        {

            $product = $this -> Product->find()
                ->matching('Category', function ($q) {
                return $q;
            })
                ->distinct(['p_id'])
                ->where(['p_country_of_origin LIKE' => "%" .
                    $this->request->getData('country_of_origin') . "%",
                    "p_sale_price_money <=" => $this->request->getData("price"),
                    'c_name LIKE' => "%" .
                        $this->request->getData('category') . "%"])
                ->order(['p_name' => 'asc'])
                ->contain(['Category']);

        }

        elseif ($this->request->getData('country_of_origin') != ''
            && $this->request->getData('price') != '')
        {
            $product = $this->Product->find('all')
                ->where(['p_country_of_origin LIKE' => "%" .
                    $this->request->getData('country_of_origin') . "%",
                    "p_sale_price_money <=" => $this->request->getData("price")])
                ->order(['p_name' => 'asc'])
                ->contain(['Category']);

        }
        elseif ($this->request->getData('country_of_origin') != '' &&
            $this->request->getData('category') != '')
        {
            $product = $this -> Product->find()
                ->matching('Category', function ($q) {
                return $q;
            })
                ->where(['p_country_of_origin LIKE' => "%" .
                    $this->request->getData('country_of_origin') . "%",
                    'c_name LIKE' => "%" .
                    $this->request->getData('category') . "%"])
                ->order(['p_name' => 'asc'])
                ->contain(['Category']);
            ;

        }

        elseif ($this->request->getData('price') != '' &&
            $this->request->getData('category') != '')
        {
            $product = $this -> Product->find()
                ->matching('Category', function ($q) {
                return $q;
            })
                ->where(["p_sale_price_money <=" => $this->request->getData("price"),
                    'c_name LIKE' => "%" .
                        $this->request->getData('category') . "%"])
                ->order(['p_name' => 'asc'])
                ->contain(['Category']);


        }

        //check if the user has entered a value in the coo box
        elseif ($this->request->getData('country_of_origin') != '') {
        //call find method of product model
            $product = $this->Product->find('all')
        //where is equivalent to a where clause in an sql statement
        //$this->request->getData = $_POST
                ->where(['p_country_of_origin LIKE' => "%" .
                    $this->request->getData('country_of_origin') . "%"])
                ->order(['p_name' => 'asc'])
                ->contain(['Category']);
        }
        elseif ($this->request->getData('price') != '')
        {
            $product = $this->Product->find('all')
                ->where(["p_sale_price_money <=" => $this->request->getData("price")])
                ->order(['p_name' => 'asc'])
                ->contain(['Category']);

        }

        elseif ($this->request->getData('category') != '')
        {

            $product = $this -> Product->find()
                ->matching('Category', function ($q) {
                return $q;
            })
                ->where(['c_name LIKE' => "%" .
                    $this->request->getData('category') . "%"])
                ->order(['p_name' => 'asc'])
                ->contain(['Category']);


        }
        else {
            $this->paginate = [
                'contain' => ['Category'],
                'order' => ['p_name asc']
            ];

            $product = $this->paginate($this->Product);

        }
        $this->set(compact('product'));
    }
    /**
     * View method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Product->get($id, [
            'contain' => ['Category', 'ProductImage']
        ]);

        $this->set('product', $product);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Product->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Product->patchEntity($product, $this->request->getData());
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $category = $this->Product->Category->find('list', ['limit' => 200]);
        $this->set(compact('product', 'category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Product->get($id, [
            'contain' => ['Category']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Product->patchEntity($product, $this->request->getData());
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $category = $this->Product->Category->find('list', ['limit' => 200]);
        $this->set(compact('product', 'category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Product->get($id);
        if ($this->Product->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
