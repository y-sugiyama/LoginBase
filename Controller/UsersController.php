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
                    
        );
 
        public function beforeFilter() {
            parent::beforeFilter();
            //コントローラのアクション処理の最初に以下の処理を行う
            //$this->Auth->authorize = array('UsersController');

            
        }
        

        
        

/**
 * index method
 *
 * @return void
 */
	public function index() {

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
	public function view($id = null) {
            //idをもったユーザが存在しなかったら
		if (!$this->User->exists($id)) {
                    //その有効ではないユーザに対して例外処理を投げます
			throw new NotFoundException('Invalid user');
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            //フォームが送信されたら
		if ($this->request->is('post')) {
                    //空にして
                    
			$this->User->create();
                    
                        //正しくデータが保存されたら
			if ($this->User->save($this->request->data)) {
				$this->Flash->success('ユーザが新規追加されました.');
				return $this->redirect(array('action' => 'index'));
			} else {
                            //正しくデータが保存されなかったら
                        }
				$this->Flash->error('ユーザが正常に保存されませんでした､再度登録をしてください.');
			}
		}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
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
        
        public function login() {
            
            //
            $this->layout='front';
            
            //postでフォームが送信されたら
            if($this->request->is('post')) {
                
                
                //送信されたデータからログイン情報を探して会員情報が存在するか調べる
                if($this->Auth->login()) {

                    //存在したら､Sessionに会員情報を記録し､ログイン後のリダイレクト先として設定したページヘリダイレクトする
                    return $this->redirect($this->Auth->redirect());
                } else {
                    //存在しなかったら以下のメッセージを返す
                    $this->Flash->set('ユーザネームかパスワードが間違っています');
         
                    
                }
            }
        }
        //ログイン情報は $this->Auth->user() で取得できます
        
        
        public function logout($id = null)
                //通常ログアウト処理は POST 送信でワンタイムトークンと共に実装すると、予期せぬログアウトなどが起こらなくてすむ
                //今回は管理画面である点とサンプルコードであるという点から、マニュアル通りの GET で実装
                {
                   $this->redirect($this->Auth->logout());
                }
                
 

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success('The user has been deleted.');
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function isAuthorized($user) {
             // Adminは全てのアクションにアクセスできる
//                if (isset($user['role']) && $user['role'] === 'admin') {
//                    return true;
//                }
                // adminユーザだけが管理 functions にアクセス可能です。
                if (isset($this->request->params['admin'])) {
                    return (bool)($user['role'] === 'admin');
                }
                
                
             // デフォルトは拒否(auther)
                return false;
        }
}
