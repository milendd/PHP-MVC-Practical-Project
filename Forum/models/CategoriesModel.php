<?php

class CategoriesModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query("SELECT * FROM categories ORDER BY id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $statement = self::$db->prepare(
            "SELECT * FROM categories WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function create($name) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "INSERT INTO categories VALUES(NULL, ?)");
        $statement->bind_param("s", $name);
        $statement->execute();
        return $statement->affected_rows > 0;
    }

    public function edit($id, $name) {
        if ($name == '') {
            return false;
        }
        $statement = self::$db->prepare(
            "UPDATE categories SET title = ? WHERE id = ?");
        $statement->bind_param("si", $name, $id);
        $statement->execute();
        return $statement->errno == 0;
    }

    public function delete($id) {
        $statement = self::$db->prepare(
            "DELETE FROM categories WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
    
    public function getQuestions($categoryId){
        $statement = self::$db->prepare(
            "SELECT q.id, q.title, u.username
            FROM categories c
            JOIN questions q ON c.id = q.category_id
            JOIN users u ON u.id = q.user_id
            WHERE c.id = ?");
        $statement->bind_param("i", $categoryId);
        $statement->execute();
        $result = $statement->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
