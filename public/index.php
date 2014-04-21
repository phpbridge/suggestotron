<?php
require 'TopicData.php';

$data = new TopicData();
$data->connect();

$topics = $data->getAllTopics();

foreach ($topics as $topic) {
    echo "<h3>" .$topic['title']. " (ID: " .$topic['id']. ")</h3>";
    echo "<p>";
    echo nl2br($topic['description']);
    echo "</p>";
}