<?php

class TagsModel extends BaseModel {
    public function getAll() {
        $statement = self::$db->query("SELECT * FROM tags ORDER BY id");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id) {
        $statement = self::$db->prepare(
            "SELECT * FROM tags WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->get_result()->fetch_assoc();
    }
	
	public function getQuestions ($tagId) {
        $statement = self::$db->prepare(
            "SELECT t.name, q.title, tq.question_id, u.username 
			FROM tags_questions tq 
			JOIN tags t ON tq.tag_id = t.id 
			JOIN questions q ON tq.question_id = q.id 
			JOIN users u ON q.user_id = u.id 
			WHERE tq.tag_id = ?");
        $statement->bind_param("i", $tagId);
        $statement->execute();
		$result = $statement->get_result();
		
        return $result->fetch_all(MYSQLI_ASSOC);
	}
	
	public function getTags ($questionId) {
        $statement = self::$db->prepare(
            "SELECT t.name, q.title, tq.question_id, tq.tag_id, u.username 
			FROM tags_questions tq 
			JOIN tags t ON tq.tag_id = t.id 
			JOIN questions q ON tq.question_id = q.id
			JOIN users u ON q.user_id = u.id 
			WHERE tq.question_id = ?");
        $statement->bind_param("i", $questionId);
        $statement->execute();
		$result = $statement->get_result();
		
        return $result->fetch_all(MYSQLI_ASSOC);
	}
}
