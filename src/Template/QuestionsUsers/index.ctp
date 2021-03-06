<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Questions User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="questionsUsers index large-9 medium-8 columns content">
    <h3><?= __('Questions Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('question_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_done') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_correct') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questionsUsers as $questionsUser): ?>
            <tr>
                <td><?= $questionsUser->has('question') ? $this->Html->link($questionsUser->question->id, ['controller' => 'Questions', 'action' => 'view', $questionsUser->question->id]) : '' ?></td>
                <td><?= $questionsUser->has('user') ? $this->Html->link($questionsUser->user->id, ['controller' => 'Users', 'action' => 'view', $questionsUser->user->id]) : '' ?></td>
                <td><?= $this->Number->format($questionsUser->is_done) ?></td>
                <td><?= $this->Number->format($questionsUser->is_correct) ?></td>
                <td><?= $this->Number->format($questionsUser->id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $questionsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $questionsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $questionsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questionsUser->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
