<?php

class QuestionsModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query(
		"SELECT q.id, q.title, q.description, c.title as category, u.username
		FROM questions q 
		JOIN categories c ON q.category_id = c.id
		JOIN users u ON q.user_id = u.id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $statement = self::$db->prepare(
            "SELECT * FROM questions WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }

    public function delete($id) {
        $statement = self::$db->prepare(
            "DELETE FROM categories WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows > 0;
    }
}