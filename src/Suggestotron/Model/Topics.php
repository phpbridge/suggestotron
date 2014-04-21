<?php
namespace Suggestotron\Model;

class Topics {
    protected $connection;
	
    public function getAllTopics()
    {
        $query = \Suggestotron\Db::getInstance()->prepare("SELECT * FROM topics");
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

	    return $query->execute($data);
	}
}
?>
