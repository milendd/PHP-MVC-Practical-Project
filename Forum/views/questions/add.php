<div id="addQuestionBox">
    <form action="<?= BASE_HOST ?>/questions/add" method="POST">
        <span>Title:</span>
        <input type="text" name="title" />
        
        <span>Description:</span>
        <textarea name="description"></textarea>
        
        <span>Category:</span>
        <select name="category">
            <?php foreach ($this->categories as $category):?>
            <option><?=htmlspecialchars($category['title'])?></option>
            <?php endforeach;?>
        </select>
        
        <span>Tags:</span>
        <input type="text" name="tags" />
        
        <input type="submit" value="Add new question" />
        <a href="<?= BASE_HOST ?>/questions">Cancel</a>
    </form>
</div>