<?php
class TopicData {
    protected $connection;

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
}
?>
