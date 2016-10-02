<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * QuestionsUsers Controller
 *
 * @property \App\Model\Table\QuestionsUsersTable $QuestionsUsers
 */
class QuestionsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Questions', 'Users']
        ];
        $questionsUsers = $this->paginate($this->QuestionsUsers);

        $this->set(compact('questionsUsers'));
        $this->set('_serialize', ['questionsUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Questions User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $questionsUser = $this->QuestionsUsers->get($id, [
            'contain' => ['Questions', 'Users']
        ]);

        $this->set('questionsUser', $questionsUser);
        $this->set('_serialize', ['questionsUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $questionsUser = $this->QuestionsUsers->newEntity();
        if ($this->request->is('post')) {
            $questionsUser = $this->QuestionsUsers->patchEntity($questionsUser, $this->request->data);
            if ($this->QuestionsUsers->save($questionsUser)) {
                $this->Flash->success(__('The questions user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The questions user could not be saved. Please, try again.'));
            }
        }
        $questions = $this->QuestionsUsers->Questions->find('list', ['limit' => 200]);
        $users = $this->QuestionsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('questionsUser', 'questions', 'users'));
        $this->set('_serialize', ['questionsUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Questions User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $questionsUser = $this->QuestionsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $questionsUser = $this->QuestionsUsers->patchEntity($questionsUser, $this->request->data);
            if ($this->QuestionsUsers->save($questionsUser)) {
                $this->Flash->success(__('The questions user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The questions user could not be saved. Please, try again.'));
            }
        }
        $questions = $this->QuestionsUsers->Questions->find('list', ['limit' => 200]);
        $users = $this->QuestionsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('questionsUser', 'questions', 'users'));
        $this->set('_serialize', ['questionsUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Questions User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $questionsUser = $this->QuestionsUsers->get($id);
        if ($this->QuestionsUsers->delete($questionsUser)) {
            $this->Flash->success(__('The questions user has been deleted.'));
        } else {
            $this->Flash->error(__('The questions user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
