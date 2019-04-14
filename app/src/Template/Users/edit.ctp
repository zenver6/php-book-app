<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<h2 class="mb-3"><i class="fas fa-user-edit"></i> ユーザー編集</h2>

<?= $this->Form->create($user) ?>
<?= $this->Form->control('username', ['label' => 'ユーザー名', 'maxLength' => 50]) ?>
<?= $this->Form->control('nickname', ['label' => 'ニックネーム', 'maxLength' => 50]) ?>

<?= $this->Form->button('更新する', ['class' => 'btn btn-warning']) ?>
<?= $this->Form->end() ?>

<p class="mb-3">
    <?= $this->Html->link('パスワードを更新する場合はこちら', ['action' => 'password']) ?>
</p>