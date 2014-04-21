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
}
?>
