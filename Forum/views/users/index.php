<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
    </tr>
    <?php foreach ($this->users as $user) : ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td>
				<a href="/users/view/<?= $user['username']?>">
					<?= htmlspecialchars($user['username'])?>
				</a>
			</td>
        </tr>
    <?php endforeach ?>
</table>