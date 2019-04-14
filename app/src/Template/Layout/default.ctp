<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js') ?>
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.bundle.js') ?>
    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.css') ?>
    <?= $this->Html->css('https://cdn.jsdelivr.net/gh/FortAwesome/Font-Awesome@5.6.3/css/all.css') ?>
    <?= $this->Html->css('https://fonts.googleapis.com/css?family=Varela+Round') ?>
    <?= $this->Html->css('custom.css') ?>

    <!-- <?= $this->Html->css('base.css') ?> -->
    <!-- <?= $this->Html->css('style.css') ?> -->

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <!-- <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav> -->

    <header class="header">
    <nav class="navbar navbar-expand-lg navbar-light background-white">
        <div class="container col-md-7 col-12">
            <a class="navbar-brand" href="/">
                <i class="fas fa-tree"></i> PHP質問広場
            </a>

            <button
                type="button"
                class="navbar-toggler"
                data-toggle="collapse"
                data-target="#Navber">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="Navber">
                <?php if ($this->request->getSession()->read('Auth.User.id')): ?>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <?= $this->Html->link('質問一覧',
                            ['controller' => 'Questions', 'action' => 'index'], ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('質問を投稿する',
                            ['controller' => 'Questions', 'action' => 'add'], ['class' => 'nav-link']) ?>
                        </li>
                    </ul>
                <?php endif; ?>

                <ul class="navbar-nav ml-auto">
                    <?php if ($this->request->getSession()->read('Auth.User.id')): ?>
                        <li class="nav-item">
                            <?= $this->Html->link($this->request->getSession()->read('Auth.User.nickname'),
                                ['controller' => 'Users', 'action' => 'edit'], ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('ログアウト',
                                ['controller' => 'Logout', 'action' => 'index'], ['class' => 'nav-link']) ?>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <?= $this->Html->link('ユーザー登録',
                                ['controller' => 'Users', 'action' => 'add'], ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('ログイン',
                                ['controller' => 'Login', 'action' => 'index'], ['class' => 'nav-link']) ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
