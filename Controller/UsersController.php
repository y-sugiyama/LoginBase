<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Session',
            'Auth' => Array(
                'loginRedirect' => Array('controller'  => 'users', 'action' => 'index'),
                'logoutRedirect' => Array('controller' => 'users', 'action' => 'login'),
                'loginAction' => Array('controller' => 'users', 'action' => 'login'),
//                'authenticate' => Array('Form' => Array('fields' => Array('username' => 'email')))
            )
        );
 

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
                $this->layout = 'admin';
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
                
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
            //フォームが送信されたら
		if ($this->request->is('post')) {
                    //空にして
			$this->User->create();
                        //正しくデータが保存されたら
			if ($this->User->save($this->request->data)) {
				$this->Flash->success('ユーザが新規追加されました.');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('ユーザが正常に保存されませんでした､再度登録をしてください.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
