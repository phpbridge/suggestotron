<?php
require '../src/Suggestotron/TopicData.php';
require '../src/Suggestotron/Template.php';

$data = new \Suggestotron\TopicData();
$data->connect();

$topics = $data->getAllTopics();

$template = new \Suggestotron\Template("../views/base.phtml");
$template->render("../views/index/index.phtml", ['topics' => $topics]);
?>