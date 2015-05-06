<h1><?= htmlspecialchars($this->title) ?></h1>

<a href="/questions/add">Add new question</a>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Username</th>
    </tr>
    <?php foreach ($this->questions as $question) : ?>
        <tr>
            <td><?= $question['id'] ?></td>
            <td>
				<a href="/questions/view/<?=$question['id']?>">
					<?= htmlspecialchars($question['title']) ?>
				</a>
			</td>
            <td><?= htmlspecialchars($question['category']) ?></td>
            <td><?= htmlspecialchars($question['username']) ?></td>
        </tr>
    <?php endforeach ?>
</table>