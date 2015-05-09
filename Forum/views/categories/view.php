<h1>Category: <?= htmlspecialchars($this->title) ?></h1>

<table>
	<?php if ($this->questions):
		foreach ($this->questions as $question) : ?>
		<tr>
			<td>
				<a href="/questions/view/<?= $question['id']?>">
					<?= htmlspecialchars($question['title'])?>
				</a>
			</td>
			<td>
				<a href="/users/view/<?= $question['username']?>">
					<?= htmlspecialchars($question['username'])?>
				</a>
			</td>
		</tr>
	<?php endforeach; else: ?>
		<div>No questions</div>
	<?php endif;?>
</table>