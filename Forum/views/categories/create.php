<h1 class="center">Create New Category</h1>

<form method="POST" action="<?= BASE_HOST ?>/categories/create" class="center">
    Category title: <br>
    <input type="text" name="title" /> <br>
    <input type="submit" value="Create">
    <a href="<?= BASE_HOST ?>/categories">Cancel</a>
</form>
