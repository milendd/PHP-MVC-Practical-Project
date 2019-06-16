<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <?php foreach ($this->categories as $category) : ?>
        <tr>
            <td>
                <a href="<?= BASE_HOST ?>/categories/view/<?=$category['id']?> ">
                    <?= htmlspecialchars($category['title'])?>
                </a>
            </td>
            <td><a href="<?= BASE_HOST ?>/categories/delete/<?=$category['id']?> ">[Delete]</a></td>
            <td><a href="<?= BASE_HOST ?>/categories/edit/<?=$category['id']?> ">[Edit]</a></td>
        </tr>
    <?php endforeach ?>
    <a href="<?= BASE_HOST ?>/categories/create">Create new category</a>
</table>