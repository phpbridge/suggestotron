<?php
require 'TopicData.php';

if (isset($_POST) && sizeof($_POST) > 0) {
    $data = new TopicData();
    $data->add($_POST);
    header("Location: /");
    exit;
}
?>

<h2>New Topic</h2>
<form action="add.php" method="POST">
    <label>
        Title: <input type="text" name="title">
    </label>
    <br>
    <label>
        Description:
        <br>
        <textarea name="description" cols="50" rows="20"></textarea>
    </label>
    <br>
    <input type="submit" value="Add Topic">
</form>
