<div id="questionBox">
	<h2><?= htmlspecialchars($this->question['title']) ?></h2>
	<p><?= htmlspecialchars($this->question['description']) ?></p>
	<p>Author: 
		<a href="/users/view/<?= $this->question['username']?>">
			<?= htmlspecialchars($this->question['username'])?>
		</a>
	</p>
	<div>
		Tags:
		<?php foreach($this->tags as $tag):?>
			<span>
				<a href="/tags/view/<?= $tag['tag_id']?>">
					<?= htmlspecialchars($tag['name'])?>
				</a>
			</span>
		<?php endforeach;?>
	</div>
	<?php if ($this->isLoggedIn): ?>
	<button id="showAnswerBox">Add answer</button>
	<?php else: ?>
		<div class="error">You cannot write answers if you are not logged in</div>
	<?php endif;?>
</div>
<?php if ($this->isLoggedIn): ?>
	<div id="answerBox" style="display:none;">
		<h2>Add answer to the question</h2>
		<form method="POST" action="/questions/addAnswer/<?= $this->getCurrentId()?>">
			<textarea name="text"></textarea>
			<input type="submit" value="Submit answer"/>
		</form>
	</div>
<?php endif;?>
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