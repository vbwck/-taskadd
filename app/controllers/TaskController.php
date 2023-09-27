<?php


namespace app\controllers;

use app\core\Route;
use app\models\TaskModel;
use http\Env\Request;

class TaskController extends AbstractController
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new TaskModel();
    }

    public function index()
    {
        $tasks = $this->model->all();
        $this->view->render('task_index', [
            'tasks' => $tasks,
        ]);
    }

    public function create()
    {
        $this->view->render('task_create');
    }

    public function store()
    {
        $task = filter_input(INPUT_POST, 'task');
        //TODO validate
        $this->model->add($task);
        Route::redirect('/task/index');
    }
    public function del(){
        $idTask = filter_input(INPUT_POST, 'idTask');
        //TODO validate
        $this->model->delete($idTask);
        Route::redirect('/task/index');
    }

    public function edit(){
        // Получить айди от кнопки редактирование.
        // ТаскМодел - получить по айди таску с базы. в рендер - таск передать.
        $taskName = filter_input(INPUT_POST, 'currentNote');
        $idTask = filter_input(INPUT_POST, 'idTask');
        $this->view->render('task_edit',[
            'task' => $taskName,
            'index' => $idTask
        ]);
//        $this->model->edit($task,$taskName);
//        Route::redirect('/task/index');
    }

    public function update()
    {
        $idTask = filter_input(INPUT_POST, 'idTask');
        $task = filter_input(INPUT_POST, 'task');
        $this->model->update($task,$idTask);
        Route::redirect('/task/index');
    }
    //index all
    //create form
    //store save new
    //edit form with exists
    //update save edit form
    //destroy delete
}