<?php
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $data = new \Suggestotron\TopicData();
    if ($data->update($_POST)) {
        header("Location: /index.php");
        exit;
    } else {
        echo "An error occurred";
    }
}

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

$template = new \Suggestotron\Template("../views/base.phtml");
$template->render("../views/index/edit.phtml", ['topic' => $topic]);
?>