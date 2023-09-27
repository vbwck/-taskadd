<?php


namespace app\models;


class TaskModel
{
    protected $db;

    public function __construct()
    {
        $this->db = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        //TODO check connect
        if ($this->db->connect_errno != 0) {
            exit($this->db->connect_error);
        }
    }

    public function add($task)
    {
        $query = "INSERT INTO tasks (name) VALUES ('$task');";
        $result = $this->db->query($query);
        $this->checkResult($result);
    }

    public function all()
    {
        $query = "SELECT * FROM tasks;";
        $result = $this->db->query($query);
        $this->checkResult($result);
        $tasks = $result->fetch_all(MYSQLI_ASSOC);
//        $tasks = [];
//        while ($task = $result->fetch_object()) {
//            $tasks[] = $task;
//        }
        return $tasks;
    }
    public  function delete($idTask)
    {
        $query = "DELETE FROM tasks WHERE id = ('$idTask')";
        $result = $this->db->query($query);
        $this->checkResult($result);
    }
    public function get($id)
    {
        $query = "SELECT id FROM tasks WHERE id = ('$id')";
        $result = $this->db->query($query);
        $this->checkResult($result);
    }
//    public function edit($task,$taskIndex)
//    {
//        $query = "UPDATE tasks SET name = $task WHERE id = $taskIndex";
//        $result = $this->db->query($query);
//        $this->checkResult($result);
//    }
    public function update($task,$index)
    {
        $query = "UPDATE tasks SET name ='$task' WHERE id = '$index'";
        $result = $this->db->query($query);
        $this->checkResult($result);
    }

    private function checkResult($result)
    {
        if (!$result) {
            //TODO exception
            //TODO add message to log file
            exit($this->db->error);
        }
    }
}