<?php
class TopicData {
    protected $connection;

	public function __construct()
	{
	    $this->connect();
	}

    public function connect()
    {
        $this->connection = new PDO("mysql:host=localhost;dbname=suggestotron", "root", "root");
    }

    public function getAllTopics()
    {
        $query = $this->connection->prepare("SELECT * FROM topics");
        $query->execute();

        return $query;
    }

    public function getTopic($id)
	{
		$sql = "SELECT * FROM topics WHERE id = :id LIMIT 1";
		$query = $this->connection->prepare($sql);

		$values = [':id' => $id];
		$query->execute($values);

		return $query->fetch(PDO::FETCH_ASSOC);
	}

	public function add($data)
	{
	    $query = $this->connection->prepare(
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
	    $query = $this->connection->prepare(
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
}
?>
