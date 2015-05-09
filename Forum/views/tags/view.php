<h1>Tag: <?= htmlspecialchars($this->title) ?></h1>

<table>
    <?php foreach ($this->questions as $question) : ?>
        <tr>
			<td>
				<a href="/questions/view/<?= $question['question_id']?>">
					<?= htmlspecialchars($question['title'])?>
				</a>
			</td>
			<td>
				<a href="/users/view/<?= $question['username']?>">
					<?= htmlspecialchars($question['username'])?>
				</a>
			</td>
        </tr>
    <?php endforeach ?>
</table>