<div id="question">
	<h2><?= htmlspecialchars($this->question['title']) ?></h2>
	<p><?= htmlspecialchars($this->question['description']) ?></p>
	<p>Author: <?= htmlspecialchars($this->question['username']) ?></p>
</div>
<table>
	<?php if ($this->answers):
		foreach ($this->answers as $answer) : ?>
		<tr>
			<td><?= htmlspecialchars($answer['text']) ?></td>
			<td><?= htmlspecialchars($answer['username']) ?></td>
		</tr>
	<?php endforeach; else: ?>
		<div>No answers</div>
	<?php endif;?>
</table>