<?php // routes/breadcrumbs.php

// https://packagist.org/packages/diglactic/laravel-breadcrumbs

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.

// Index
Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
  $trail->push('Home', route('index'));
});

// Index > Tasks
Breadcrumbs::for('tasks', function (BreadcrumbTrail $trail) {
  $trail->parent('index');
  $trail->push('Tasks', route('task.list'));
});

// Index > Tasks > [Task]
Breadcrumbs::for('task', function (BreadcrumbTrail $trail, $task) {
  $trail->parent('tasks');
  $trail->push($task->title, route('task.view', $task));
});