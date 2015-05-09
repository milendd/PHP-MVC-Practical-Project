<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php foreach ($this->tags as $tag) : ?>
        <tr>
            <td><?= $tag['id'] ?></td>
			<td>
				<a href="/tags/view/<?= $tag['id']?>">
					<?= htmlspecialchars($tag['name'])?>
				</a>
			</td>
        </tr>
    <?php endforeach ?>
</table>