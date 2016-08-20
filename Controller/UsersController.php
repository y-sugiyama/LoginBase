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
    }

    public function isAuthorized($user) {
        // action配列の中に以下のアクションが含まれていたら
        if (in_array($this->action, ['login', 'logout', 'index', 'change_password', 'view', 'edit'])) {
//            trueを返す(roleがadminでもuserでもそのactionにアクセスできる)
            return true;
        }
        //それ以外のactionの場合は､管理者adminだけがアクセスできる
        if ($user['role'] === 'admin') {
            return true;
        }

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

        //パスワードを入力する項目において､not Blankのバリデーションをこのアクションでは無効にする
        //(パスワードがブランクでもフォームが送信できるように)
        $this->User->validator()->remove('password', 'notBlank');

        //渡された$idが存在したら$idからデータを見つけてさらってきます
        $user = $this->User->findById($id);

        //その場合､DBから拾ってきたパスワードは表示しないようにしとく(ハッシュ化→ハッシュ化されてしまう
        if (isset($user['User']['password'])) {
            unset($user['User']['password']);
        }

        //管理者が新しいパスワードを入力する場合はここで入力
        //データが$userではなかったら
        if (!$user) {
            //'Invalid user 'の例外を投げます
            throw new NotFoundException(__('Invalid user'));
        }
        //データがpostかputだったら
        if ($this->request->is(array('post', 'put'))) {
            //$idをidに代入します
            $this->User->id = $id;

            //フォームから入力された値の両端の空白(全角･半角)をトリミングして､空白が連続入力された場合などを防ぐ
            $trimed_password = trim($this->request->data['User']['password']);


            //もしフォームから送信されてきたパスワードが空だったら
            if ($trimed_password == '') {

                //連想配列のkey['password']ごと破棄する
                unset($trimed_password);
            }


            //呼びだされたデータが保存されたら
            if ($this->User->save($this->request->data)) {


                //Flashコンポーネントを使ってメッセージを表示します
                $this->Flash->success('ユーザは保存されました');

                //Authコンポーネントのログインセッション情報をリフレッシュ
                $user = $this->User->find('first', [
                    'fields' => ['id', 'username', 'role'],
                    'conditions' => ['id' => $this->Auth->user('id')]
                ]);
                $this->Auth->login($user['User']);

                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->danger('ユーザを更新できませんでした');
        }
        //$this->request->data が空っぽだったら、取得していたポストレコードを そのままセットしておきます
        if (!$this->request->data) {
            $this->request->data = $user;
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
        //現在ログインしているユーザのidをとってきてフォームにいれる
                
         $this->request->data = ['User' => ['id' => $this->Auth->user('id')]];
         
        //フォームがpostかputで送信されたら
        if ($this->request->is(['post', 'put'])) {

            //リクエストデータが保存されたら
            if ($this->User->save($this->request->data)) {
                //flashコンポーネントを使ってメッセージを表示する
                $this->Flash->success('パスワードを更新しました');
                //Authコンポーネントで指定したredirectUrlにリダイレクトする
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                
                $this->Flash->danger('パスワードは変更されませんでした｡再度変更してください');
            }
        }
    }

}
