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
    public $components = array('Paginator', 'Session',
    );

    public function beforeFilter() {
        parent::beforeFilter();
        //コントローラのアクション処理の最初に以下の処理を行う
        
    }

    public function isAuthorized($user) {
//         Adminは全てのアクションにアクセスできる
        if (isset($user['role']) && $user['role'] === 'admin') {
                    return true;
                }
        // adminユーザだけが管理 functions にアクセス可能です。
        if (isset($this->request->params['admin'])) {
            return (bool) ($user['role'] === 'admin');
        }

        // デフォルトは拒否(user)
        return false;
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
            $this->Flash->danger('ユーザが正常に保存されませんでした､再度登録をしてください.');
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

        //渡された$idが存在しなかったら
        if (!$id) {
            //'Invalid post'の例外処理を投げます
            throw new NotFoundException('Invalid post');
        }
        //渡された$idが存在したら$idからデータを見つけてさらってきます
        $post = $this->User->findById($id);

        //データがpostではなかったら
        if (!$post) {
            //'Invalid post'の例外処理を投げます
            throw new NotFoundException(__('Invalid post'));
        }
        //データがpostかputだったら
        if ($this->request->is(array('post', 'put'))) {
            //$idをidに代入します
            $this->User->id = $id;
            //呼びだされたデータが保存されたら
            if ($this->User->save($this->request->data)) {
                //Flashコンポーネントを使ってメッセージを表示します
                $this->Flash->success(__('投稿は保存されました'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->danger(__('投稿を更新できませんでした'));
        }
        //$this->request->data が空っぽだったら、取得していたポストレコードを そのままセットしておきます
        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }

    public function login() {

        //
        $this->layout = 'front';


        //postでフォームが送信されたら
        if ($this->request->is('post')) {

            //送信されたデータからログイン情報を探して会員情報が存在するか調べる
            if ($this->Auth->login()) {

                //存在したら､Sessionに会員情報を記録し､ログイン後のリダイレクト先として設定したページヘリダイレクトする
                $this->Flash->success('ログインしました');
                return $this->redirect($this->Auth->redirect());
            } else {
                //存在しなかったら以下のメッセージを返す

                $this->Flash->danger('ユーザネームかパスワードが間違っています');
            }
        }
    }

    //ログイン情報は $this->Auth->user() で取得できます


    public function logout($id = null) {
        //通常ログアウト処理は POST 送信でワンタイムトークンと共に実装すると、予期せぬログアウトなどが起こらなくてすむ

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
            $this->Flash->success('このユーザは削除されました.');
        } else {
            $this->Flash->danger('ユーザは削除されませんでした｡再度削除してください');
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function change_password() {


        //フォームがpostかputで送信されたら
        if ($this->request->is(['post', 'put'])) {

            //リクエストデータが保存されたら
            if ($this->User->save($this->request->data)) {
                //flashコンポーネントを使ってメッセージを表示する
                $this->Flash->success('パスワードを更新しました');
                //Authコンポーネントで指定したredirectUrlにリダイレクトする
                return $this->redirect($this->Auth->redirectUrl());
            }
        } else {
            //現在ログインしているユーザのidをとってきて$this->request->dataにいれる
            $this->request->data = ['User' => ['id' => $this->Auth->user('id')]];
            $this->Flash->danger('パスワードは変更されませんでした｡再度変更してください');
        }
    }

//    public function edit_user($id = null) {
//        var_dump($id);
//        exit;
//        //渡された$idが存在しなかったら
//        if (!$id) {
//            //'Invalid post'の例外処理を投げます
//            throw new NotFoundException('Invalid post');
//        }
//          //渡された$idが存在したら$idからデータを見つけてさらってきます
//        $post = $this->User->findById($id);
//        
//        //データがpostではなかったら
//        if (!$post) {
//            //'Invalid post'の例外処理を投げます
//            throw new NotFoundException(__('Invalid post'));
//        }
//         //データがpostかputだったら
//        if ($this->request->is(array('post', 'put'))) {
//            //$idをidに代入します
//            $this->User->id = $id;
//            //呼びだされたデータが保存されたら
//            if ($this->User->save($this->request->data)) {
//                //Flashコンポーネントを使ってメッセージを表示します
//                $this->Flash->success(__('投稿は保存されました'));
//                return $this->redirect(array('action' => 'index'));
//            }
//            $this->Flash->error(__('投稿を更新できませんでした'));
//        }
//        //$this->request->data が空っぽだったら、取得していたポストレコードを そのままセットしておきます
//        if (!$this->request->data) {
//            $this->request->data = $post;
//        }
//    }
}
