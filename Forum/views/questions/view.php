<div class="question">
    <h2><?= htmlspecialchars($this->question['title']) ?></h2>
    <span><?= htmlspecialchars($this->question['description']) ?></span>
    <br><br>
    <span>Author: 
        <a href="<?= BASE_HOST ?>/users/view/<?= $this->question['username']?>">
            <?= htmlspecialchars($this->question['username'])?>
        </a>
    </span><br>
    <span>Visits: <?= htmlspecialchars($this->question['counter'])?></span>
    <br>
    <div>
        Tags:
        <?php foreach($this->tags as $tag):?>
            <span>
                <a href="<?= BASE_HOST ?>/tags/view/<?= $tag['tag_id']?>">
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
        <form method="POST" action="<?= BASE_HOST ?>/questions/addAnswer/<?= $this->getCurrentId()?>">
            <textarea name="text"></textarea><br>
            <input type="submit" value="Submit answer"/>
        </form>
    </div>
<?php endif;?>
<br>
<?php if ($this->answers):
    foreach ($this->answers as $answer) : ?>
    <div class="question">
        <p><?= htmlspecialchars($answer['text']) ?></p>
        <span>Author: </span>
        <a href="<?= BASE_HOST ?>/users/view/<?= $answer['username']?>">
            <?= htmlspecialchars($answer['username'])?>
        </a>
    </div>
<?php endforeach; else: ?>
    <div>No answers</div>
<?php endif;?>