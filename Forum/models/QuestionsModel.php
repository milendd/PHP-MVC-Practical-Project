<?php

class QuestionsModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query(
            "SELECT q.id, q.title, q.counter, c.title as categoryTitle, c.id as categoryId, u.username
            FROM questions q 
            JOIN categories c ON q.category_id = c.id
            JOIN users u ON q.user_id = u.id
            ORDER BY q.id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $statement = self::$db->prepare(
            "SELECT q.title, q.description, q.counter, u.username
            FROM questions q
            JOIN users u ON q.user_id = u.id
            WHERE q.id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }
        
    public function getTagId($tagName) {
        $statement = self::$db->prepare(
            "SELECT id
            FROM tags
            WHERE name = ?");
        $statement->bind_param("s", $tagName);
        $statement->execute();
        return $statement->get_result()->fetch_assoc()['id'];
    }
    
    function updateCounter($id) {
        $statement = self::$db->prepare(
            "SELECT counter
            FROM questions
            WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $counter = $statement->get_result()->fetch_assoc()['counter'];
        $counter++;
        
        $statement = self::$db->prepare(
            "UPDATE questions 
            SET counter = ? 
            WHERE id = ?");
        $statement->bind_param("ii", $counter, $id);
        $statement->execute();
        
        return $statement->errno == 0;
    }
    
    public function add($title, $description, $category, $tags) {
        if ($title == "" || $description == "" || $category == "" || $tags == ""){
            return false;
        }
        
        $categoryStatement = $this->getCategoryStatementFromName($category);
        if (!isset($categoryStatement['id'])){
            return false;
        }
        $categoryId = $categoryStatement['id'];
        
        $userStatement = $this->getUserStatementFromName($_SESSION['user']);
        if (!isset($userStatement['id'])){
            return false;
        }
        $userId = $userStatement['id'];
        
        $statement = self::$db->prepare(
            "INSERT INTO questions (title, description, category_id, user_id)
            VALUES (?, ?, ?, ?)");
        $statement->bind_param("ssii", $title, $description, $categoryId, $userId);
        $statement->execute();
        
        if ($statement->affected_rows == 0){
            return false;
        }
        
        $questionId = $statement->insert_id;
        $tags = preg_split("/[\s,]+/", $tags);
        $this->addTagsToQuestion($tags, $questionId);
        
        return true;
    }
    
    public function delete($id) {
        //only admin!
        
        $statement = self::$db->prepare(
            "DELETE FROM categories WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
    
    public function addAnswer($text, $questionId){
        if (strlen($text) <= 10){
            return false;
        }
        
        $userStatement = $this->getUserStatementFromName($_SESSION['user']);
        if (!isset($userStatement['id'])){
            return false;
        }
        $userId = $userStatement['id'];
        
        $statement = self::$db->prepare(
            "INSERT INTO answers (text, question_id, user_id) 
            VALUES (?, ?, ?)");
        $statement->bind_param("sii", $text, $questionId, $userId);
        $statement->execute();
        
        return $statement->affected_rows > 0;;
    }
    
    public function getAnswers($id) {
        $statement = self::$db->prepare(
            "SELECT a.text, u.username 
            FROM answers a 
            JOIN users u ON a.user_id = u.id 
            WHERE a.question_id = ?
            ORDER BY a.id");
        $statement->bind_param("i", intval($id));
        $statement->execute();
        $result = $statement->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function addTagsToQuestion($tags, $questionId) {
        foreach ($tags as $tag){
            $statement = self::$db->prepare("INSERT INTO tags (name) VALUES (?)");
            $statement->bind_param("s", $tag);
            $statement->execute();
            
            $tagId = $this->getTagId($tag);
            
            $statement = self::$db->prepare("INSERT INTO tags_questions (question_id, tag_id) VALUES (?, ?)");
            $statement->bind_param("ii", $questionId, $tagId);
            $statement->execute();
        }
    }
    
    private function getCategoryStatementFromName($categoryName){
        $categoryStatement = self::$db->prepare("SELECT id FROM categories WHERE title = ?");
        $categoryStatement->bind_param("s", $categoryName);
        $categoryStatement->execute();
        
        return $categoryStatement->get_result()->fetch_assoc();
    }
    
    private function getUserStatementFromName($username){
        $userStatement = self::$db->prepare("SELECT id FROM users WHERE username = ?");
        $userStatement->bind_param("s", $username);
        $userStatement->execute();
        
        return $userStatement->get_result()->fetch_assoc();
    }
}