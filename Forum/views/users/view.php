<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
	<div>Username: <?= htmlspecialchars($this->selectedUser['username']); ?></div>
	<div>Email: <?= htmlspecialchars($this->selectedUser['email']); ?></div>
	<tr>
		<!--<td><?= $category['id'] ?></td>
		<td><?= htmlspecialchars($category['title']) ?></td>
		<td><a href="/categories/delete/<?=$category['id']?> ">[Delete]</a></td>
		<td><a href="/categories/edit/<?=$category['id']?> ">[Edit]</a></td>
		-->
	</tr>
</table>