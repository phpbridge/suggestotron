<?php
require 'TopicData.php';

$data = new TopicData();
$data->connect();

$topics = $data->getAllTopics();
?>
<!doctype html>
<html>
    <head>
        <title>Suggestotron</title>
    </head>
    <body>
        <?php
        foreach ($topics as $topic) {
            echo "<h3>" .$topic['title']. " (ID: " .$topic['id']. ")</h3>";
            echo "<p>";
            echo nl2br($topic['description']);
            echo "</p>";
            echo "<p>";
            echo "<a href='/edit.php?id=" .$topic['id']. "'>Edit</a>";
            echo " | ";
            echo "<a href='/delete.php?id=" .$topic['id']. "'>Delete</a>";
            echo "</p>";
        }
        ?>
    </body>
</html>