<?php
$data = new \Suggestotron\TopicData();

$topics = $data->getAllTopics();

$template = new \Suggestotron\Template("../views/base.phtml");
$template->render("../views/index/list.phtml", ['topics' => $topics]);
?>