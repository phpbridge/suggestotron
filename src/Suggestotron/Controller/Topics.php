<?php
namespace Suggestotron\Controller;

class Topics {
    public function listAction() {
        $data = new \Suggestotron\TopicData();

        $topics = $data->getAllTopics();

        $template = new \Suggestotron\Template("../views/base.phtml");
        $template->render("../views/index/list.phtml", ['topics' => $topics]);
    }

    public function addAction()
    {
        if (isset($_POST) && sizeof($_POST) > 0) {
            $data = new \Suggestotron\TopicData();
            $data->add($_POST);
            header("Location: /");
            exit;
        }

        $template = new \Suggestotron\Template("../views/base.phtml");
        $template->render("../views/index/add.phtml");
    }

    public function editAction()
    {
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
    }

    public function deleteAction()
    {
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
    }
}
?>