<?php

namespace App\Controller;

/**
 * logout controller
 */
class LogoutController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->deny(['index']);
    }

    /**
     * ログアウト
     * 
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->Flash->success('ログアウトしました');
        return $this->redirect($this->Auth->logout());
    }
}
