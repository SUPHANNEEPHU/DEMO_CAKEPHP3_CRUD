<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CoursesUser $coursesUser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $coursesUser->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $coursesUser->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Courses Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="coursesUsers form large-9 medium-8 columns content">
    <?= $this->Form->create($coursesUser) ?>
    <fieldset>
        <legend><?= __('Edit Courses User') ?></legend>
        <?php
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('course_id', ['options' => $courses, 'empty' => true]);
            echo $this->Form->control('days_attended');
            echo $this->Form->control('score');
            echo $this->Form->control('grade');
            echo $this->Form->control('status');
            echo $this->Form->control('modifed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
