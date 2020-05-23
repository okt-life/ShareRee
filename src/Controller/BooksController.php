<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 *
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Employees'],
        ];
        $books = $this->paginate($this->Books);

        $this->set(compact('books'));
    }

    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => ['Employees', 'Books', 'Favorites', 'LendingStatuses'],
        ]);

        $this->set('book', $book);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $book = $this->Books->newEntity();
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $employees = $this->Books->Employees->find('list', ['limit' => 200]);
        $this->set(compact('book', 'employees'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $employees = $this->Books->Employees->find('list', ['limit' => 200]);
        $this->set(compact('book', 'employees'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
