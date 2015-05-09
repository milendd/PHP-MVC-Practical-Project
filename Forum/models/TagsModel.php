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
}
