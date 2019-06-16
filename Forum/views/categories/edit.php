<h1>Create New Category</h1>

<?php if ($this->category) { ?>
<form method="post" action="<?= BASE_HOST ?>/categories/edit/<?= $this->category['id'] ?>">
    Author name: <input type="text" name="title" value="<?= htmlspecialchars($this->category['title']) ?>" />
    <input type="submit" value="Edit" />
    <a href="<?= BASE_HOST ?>/categories">Cancel</a>
</form>
<?php } ?>
