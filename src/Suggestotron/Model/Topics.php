<?php
namespace Suggestotron\Model;

class Topics {
    protected $connection;
	
	public function getAllTopics()
	{
	    $sql = "SELECT 
	                topics.*,
	                votes.count
	            FROM topics INNER JOIN votes ON (
	                votes.topic_id = topics.id
	            )
	            ORDER BY votes.count DESC, topics.title ASC";

	    $query = \Suggestotron\Db::getInstance()->prepare($sql);
	    $query->execute();
	    return $query;
	}

    public function getTopic($id)
	{
		$sql = "SELECT * FROM topics WHERE id = :id LIMIT 1";
		$query = \Suggestotron\Db::getInstance()->prepare($sql);

		$values = [':id' => $id];
		$query->execute($values);

		return $query->fetch(\PDO::FETCH_ASSOC);
	}

	public function add($data)
	{
	    $query = \Suggestotron\Db::getInstance()->prepare(
	        "INSERT INTO topics (
	            title,
	            description
	        ) VALUES (
	            :title,
	            :description
	        )"
	    );

	    $data = [
	        ':title' => $data['title'],
	        ':description' => $data['description']
	    ];

	    $query->execute($data);

	    // Grab the newly created topic ID
	    $id = \Suggestotron\Db::getInstance()->lastInsertId();

	    // Add empty vote row
	    $sql = "INSERT INTO votes (
	                topic_id,
	                count
	            ) VALUES (
	                :id,
	                0
	            )";

	    $data = [
	        ':id' => $id
	    ];

	    $query = \Suggestotron\Db::getInstance()->prepare($sql);
	    $query->execute($data);
	}

	public function update($data)
	{
	    $query = \Suggestotron\Db::getInstance()->prepare(
	        "UPDATE topics 
	            SET 
	                title = :title, 
	                description = :description
	            WHERE
	                id = :id"
	    );

	    $data = [
	        ':id' => $data['id'],
	        ':title' => $data['title'],
	        ':description' => $data['description']
	    ];

	    return $query->execute($data);
	}

	public function delete($id) {
	    $query = \Suggestotron\Db::getInstance()->prepare(
	        "DELETE FROM topics
	            WHERE
	                id = :id"
	    );

	    $data = [
	        ':id' => $id,
	    ];

	    $result = $query->execute($data);

		if (!$result) {
		   return false;
		}

		$sql = "DELETE FROM votes WHERE topic_id = :id";
		$query = \Suggestotron\Db::getInstance()->prepare($sql);

		return $query->execute($data);
	}
}
?>
