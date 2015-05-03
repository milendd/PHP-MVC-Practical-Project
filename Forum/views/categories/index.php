<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
    </tr>
    <?php foreach ($this->categories as $category) : ?>
        <tr>
            <td><?= $category['id'] ?></td>
            <td><?= htmlspecialchars($category['title']) ?></td>
            <td><a href="/authors/delete/<?=$category['id']?> ">[Delete]</a></td>
        </tr>
    <?php endforeach ?>
</table>