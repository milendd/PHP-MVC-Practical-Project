<h1>Tag: <?= htmlspecialchars($this->title) ?></h1>

<table>
    <?php foreach ($this->questions as $question) : ?>
        <div class="question">
        <h2>
            <a href="<?= BASE_HOST ?>/questions/view/<?=$question['question_id']?>">
                <?= htmlspecialchars($question['title']) ?>
            </a>
        </h2>
        <span>Author: </span>
        <a href="<?= BASE_HOST ?>/users/view/<?= $question['username']?>">
            <?= htmlspecialchars($question['username'])?>
        </a>
        </div>
    <?php endforeach ?>
</table>

