<h1><?= htmlspecialchars($this->title) ?></h1>

<a href="/questions/add">Add new question</a>
<?php foreach ($this->questions as $question) : ?>
	<div class="question">
	<h2>
		<a href="/questions/view/<?=$question['id']?>">
			<?= htmlspecialchars($question['title']) ?>
		</a>
	</h2>
	<span>Category: </span>
	<a href="/categories/view/<?= $question['categoryId']?>">
		<?= htmlspecialchars($question['categoryTitle'])?>
	</a><br>
	<span>Author: </span>
	<a href="/users/view/<?= $question['username']?>">
		<?= htmlspecialchars($question['username'])?>
	</a><br>
	<span>Visits: <?= htmlspecialchars($question['counter'])?></span>
	</div>
<?php endforeach ?>