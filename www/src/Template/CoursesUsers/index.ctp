<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CoursesUser[]|\Cake\Collection\CollectionInterface $coursesUsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Courses User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="coursesUsers index large-9 medium-8 columns content">
    <h3><?= __('Courses Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('days_attended') ?></th>
                <th scope="col"><?= $this->Paginator->sort('score') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grade') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modifed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($coursesUsers as $coursesUser): ?>
            <tr>
                <td><?= $this->Number->format($coursesUser->id) ?></td>
                <td><?= $coursesUser->has('user') ? $this->Html->link($coursesUser->user->id, ['controller' => 'Users', 'action' => 'view', $coursesUser->user->id]) : '' ?></td>
                <td><?= $coursesUser->has('course') ? $this->Html->link($coursesUser->course->name, ['controller' => 'Courses', 'action' => 'view', $coursesUser->course->id]) : '' ?></td>
                <td><?= $this->Number->format($coursesUser->days_attended) ?></td>
                <td><?= $this->Number->format($coursesUser->score) ?></td>
                <td><?= h($coursesUser->grade) ?></td>
                <td><?= h($coursesUser->status) ?></td>
                <td><?= h($coursesUser->created) ?></td>
                <td><?= h($coursesUser->modifed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $coursesUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $coursesUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $coursesUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $coursesUser->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
