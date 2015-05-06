<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
    </tr>
	<?php var_dump($this->questions);?>
	<br>
    <?php foreach ($this->questions as $question) : ?>
        <tr>
            <td><?= $question['id'] ?></td>
            <td><?= htmlspecialchars($question['title']) ?></td>
            <td><?= htmlspecialchars($question['description']) ?></td>
        </tr>
    <?php endforeach ?>
</table>