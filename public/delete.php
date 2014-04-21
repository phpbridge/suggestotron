<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "You did not pass in an ID.";
    exit;
}

$data = new \Suggestotron\TopicData();
$topic = $data->getTopic($_GET['id']);

if ($topic === false) {
    echo "Topic not found!";
    exit;
}

if ($data->delete($_GET['id'])) {
    header("Location: /index.php");
    exit;
} else {
    echo "An error occurred";
}
?>