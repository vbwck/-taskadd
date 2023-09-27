<h1>All tasks</h1>
<a href="/task/create">New task</a>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>task</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
    <?php if(count($tasks)>0):?>
        <?php foreach ($tasks as $i => $task):?>
        <tr>
            <td><?= $task['id']?></td>
            <td><?= $task['name']?></td>
            <td>
                <form action="/task/edit" method="post">
                    <input type="hidden" name="currentNote" value="<?= $task['name']?>">
                    <input type="submit" name="edit" value="Edit &#9998;">
                    <input type="hidden" name="idTask" value="<?= $task['id'] ?>">
                </form>
            </td>
            <td>
                <form action="/task/del" method="post">
                     <input type="submit" name="delete" value="Delete &#129530;">
                    <input type="hidden" name="idTask" value="<?= $task['id'] ?>">
                </form>
            </td>
        </tr>
        <?php endforeach;?>
    <?php endif;?>
    </tbody>
</table>