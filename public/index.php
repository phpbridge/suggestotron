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
        <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Suggestotron</a>
                </div>
                <form class="navbar-form navbar-right" role="search">
                    <a href="/add.php" class="btn btn-default">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        Add Topic
                    </a>
                </form>
            </div>
        </nav>
        <div class="container">
            <?php
            foreach ($topics as $topic) {
                ?>
                <section>
                    <div class="row">
                        <div class="col-xs-12">
                            <h3><?=$topic['title'];?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <p class="text-muted">
                                <?=nl2br($topic['description']);?>
                            </p>
                        </div>
                        <div class="col-xs-4">
                            <p class="pull-right">
                                <a href="/edit.php?id=<?=$topic['id']; ?>" class="btn btn-primary">Edit</a>
                                <a href="/delete.php?id=<?=$topic['id']; ?>" class="btn btn-danger">Delete</a>
                            </p>
                        </div>
                    </div>
                </section>
                <hr>
                <?php
            }
            ?>
        </div>
    </body>
</html>