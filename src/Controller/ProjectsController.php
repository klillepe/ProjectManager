<?php
namespace App\Controller;

use App\Controller\AppController;


/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{
    public function isAuthorized($user) {
        // Registered users can see a list of their projects and add new one
        if (in_array($this->request->action, ['list', 'add'])) {
            return true;
        }

        // Project owner can view, edit and delete the project
        if (in_array($this->request->action, ['view', 'edit', 'delete'])) {
            $project = $this->Projects->get($this->request->params['pass'][0]);
            if($project->user_id == $this->Auth->user('id')) {
                return true;
            }
            if(!$this->Auth->user('role') == 'admin'){
                $this->Flash->error(__('This is not your project.'));
            }
        }
    return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'limit' => 15
        ];
        // List only projects that are not finished
        $projects = $this->paginate($this->Projects->find('all')->where(['p_status !=' => 'Lõpetatud']));
        $this->set(compact('projects'));
        $this->set('_serialize', ['projects']);
    }

    /** List method
     *
     *  List all or one user projects
     */
    public function list()
    {
        $this->paginate = [
            'limit' => 15,
            'contain' => ['Users']
        ];
        if($this->Auth->user('role') == 'admin') {
            $projects = $this->paginate($this->Projects->find('all'));
        } else {
            $projects = $this->paginate($this->Projects->find('all')->where(['user_id' => $this->Auth->user('id')]));
        }
        $this->set(compact('projects'));
        $this->set('_serialize', ['projects']);
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'list']);
            } else {
                $this->Flash->error(__('The project could not be saved. Please, try again.'));
            }
        }
        // Admin can add everyone as project leader
        if($this->Auth->user('role') == 'admin') {
        $users = $this->Projects->Users
                ->find('list',['keyField' => 'id', 'valueField' => 'username']);
        } else {
            // Registered users can add themselves
            $users = $this->Projects->Users
                    ->find('list',['keyField' => 'id', 'valueField' => 'username'])
                    ->where(['id' => $this->Auth->user('id')]);
        }
        $this->set(compact('project', 'users'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->data);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'list']);
            } else {
                $this->Flash->error(__('The project could not be saved. Please, try again.'));
            }
        }
        $users = $this->Projects->Users->find('list',['keyField' => 'id', 'valueField' => 'username']);
        $this->set(compact('project', 'users'));
        $this->set('_serialize', ['project']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'list']);
    }
}
