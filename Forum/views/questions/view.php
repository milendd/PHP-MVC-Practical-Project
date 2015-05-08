<div id="questionBox">
	<h2><?= htmlspecialchars($this->question['title']) ?></h2>
	<p><?= htmlspecialchars($this->question['description']) ?></p>
	<p>Author: 
		<a href="/users/view/<?= $this->question['username']?>">
			<?= htmlspecialchars($this->question['username'])?>
		</a>
	</p>
	<button id="addAnswerButton">Add answer</button>
</div>
<div id="addAnswerBox" style="display:block">
	<h2>Add answer to the question</h2>
	<form method="POST" action="/questions/addAnswer">
		<textarea name="text"></textarea>
		<input type="submit" value="Submit answer"/>
	</form>
</div>
<table>
	<?php if ($this->answers):
		foreach ($this->answers as $answer) : ?>
		<tr>
			<td><?= htmlspecialchars($answer['text']) ?></td>
			<td>
				<a href="/users/view/<?= $answer['username']?>">
					<?= htmlspecialchars($answer['username'])?>
				</a>
			</td>
		</tr>
	<?php endforeach; else: ?>
		<div>No answers</div>
	<?php endif;?>
</table>
</div>