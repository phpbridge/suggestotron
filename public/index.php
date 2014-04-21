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
        <script type="text/javascript" src="/js/jquery-2.1.0.min.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
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
                                <a href="/delete.php?id=<?=$topic['id']; ?>" class="btn btn-danger" data-container="body" data-toggle="popover" data-trigger="hover" data-placement="top" data-title="Are you sure?" data-content=" This cannot be undone!">Delete</a>
                            </p>
                        </div>
                    </div>
                </section>
                <hr>
                <?php
            }
            ?>
        </div>
        <script type="text/javascript">
            $('[data-toggle="popover"]').popover();
        </script>
    </body>
</html>