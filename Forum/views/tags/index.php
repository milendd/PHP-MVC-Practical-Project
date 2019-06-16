<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <?php foreach ($this->tags as $tag) : ?>
        <tr>
            <td>
                <a href="<?= BASE_HOST ?>/tags/view/<?= $tag['id']?>">
                    <?= htmlspecialchars($tag['name'])?>
                </a>
            </td>
        </tr>
    <?php endforeach ?>
</table>