<?php
require 'TopicData.php';

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $data = new TopicData();
    if ($data->update($_POST)) {
        header("Location: /index.php");
        exit;
    } else {
        echo "An error occurred";
        exit;
    }
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "You did not pass in an ID.";
    exit;
}

$data = new TopicData();
$topic = $data->getTopic($_GET['id']);

if ($topic === false) {
    echo "Topic not found!";
    exit;
}
?>
<!doctype html>
<html>
    <head>
        <title>Suggestotron</title>
    </head>
    <body>
        <h2>Edit Topic</h2>
        <form action="edit.php" method="POST">
            <label>
                Title: <input type="text" name="title" value="<?=$topic['title'];?>">
            </label>
            <br>
            <label>
                Description:
                <br>
                <textarea name="description" cols="50" rows="20"><?=$topic['description'];?></textarea>
            </label>
            <br>
            <input type="hidden" name="id" value="<?=$topic['id'];?>">
            <input type="submit" value="Edit Topic">
        </form>
    </body>
</html>