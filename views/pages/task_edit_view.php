<h1>Editing current task:</h1>
<form action="/task/update" method="post">
    <label>Task
        <input type="text" name="task" value="<?= $task ?>"/>
        <input type="hidden" name="index" value="<?= $index?>"/>
<!--        --><?php //echo $index?>
    </label>
    <input type="submit" value="Update"/>
</form>