<h1>Category: <?= htmlspecialchars($this->title) ?></h1>

<table>
    <?php if ($this->questions):
    foreach ($this->questions as $question): ?>
        <div class="question">
        <h2>
            <a href="<?= BASE_HOST ?>/questions/view/<?=$question['id']?>">
                <?= htmlspecialchars($question['title']) ?>
            </a>
        </h2>
        <span>Author: </span>
        <a href="<?= BASE_HOST ?>/users/view/<?= $question['username']?>">
            <?= htmlspecialchars($question['username'])?>
        </a>
        </div>
    <?php endforeach; else: ?>
        <div>No questions</div>
    <?php endif;?>
</table>