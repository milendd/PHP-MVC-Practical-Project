<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Category</th>
        <th>Username</th>
    </tr>
    <?php foreach ($this->questions as $question) : ?>
        <tr>
            <td><?= $question['id'] ?></td>
            <td><?= htmlspecialchars($question['title']) ?></td>
            <td><?= htmlspecialchars($question['description']) ?></td>
            <td><?= htmlspecialchars($question['category']) ?></td>
            <td><?= htmlspecialchars($question['username']) ?></td>
        </tr>
    <?php endforeach ?>
</table>