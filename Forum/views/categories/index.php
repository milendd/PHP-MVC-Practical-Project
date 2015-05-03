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
            <td><a href="/categories/delete/<?=$category['id']?> ">[Delete]</a></td>
            <td><a href="/categories/edit/<?=$category['id']?> ">[Edit]</a></td>
        </tr>
    <?php endforeach ?>
	<a href="categories/create">Create new category</a>
</table>