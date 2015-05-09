<h1><?= htmlspecialchars($this->title) ?></h1>

<a href="/questions/add">Add new question</a>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Visits</th>
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
			<td>
				<a href="/categories/view/<?= $question['categoryId']?>">
					<?= htmlspecialchars($question['categoryTitle'])?>
				</a>
			</td>
			<td><?= htmlspecialchars($question['counter'])?></td>
            <td>
				<a href="/users/view/<?= $question['username']?>">
					<?= htmlspecialchars($question['username'])?>
				</a>
			</td>
        </tr>
    <?php endforeach ?>
</table>