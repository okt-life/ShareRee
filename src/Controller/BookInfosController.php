<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * BookInfos Controller
 *
 * @property \App\Model\Table\BookInfosTable $BookInfos
 *
 * @method \App\Model\Entity\BookInfo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BookInfosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $bookInfos = $this->paginate($this->BookInfos);

        $this->set(compact('bookInfos'));
    }

    /**
     * View method
     *
     * @param string|null $id Book Info id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookInfo = $this->BookInfos->get($id, [
            'contain' => ['Favorites'],
        ]);

        $this->set('bookInfo', $bookInfo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookInfo = $this->BookInfos->newEntity();
        if ($this->request->is('post')) {
            $bookInfo = $this->BookInfos->patchEntity($bookInfo, $this->request->getData());
            if ($this->BookInfos->save($bookInfo)) {
                $this->Flash->success(__('The book info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book info could not be saved. Please, try again.'));
        }
        $this->set(compact('bookInfo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Book Info id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bookInfo = $this->BookInfos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bookInfo = $this->BookInfos->patchEntity($bookInfo, $this->request->getData());
            if ($this->BookInfos->save($bookInfo)) {
                $this->Flash->success(__('The book info has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book info could not be saved. Please, try again.'));
        }
        $this->set(compact('bookInfo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book Info id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookInfo = $this->BookInfos->get($id);
        if ($this->BookInfos->delete($bookInfo)) {
            $this->Flash->success(__('The book info has been deleted.'));
        } else {
            $this->Flash->error(__('The book info could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
