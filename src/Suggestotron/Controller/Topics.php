<?php
namespace Suggestotron\Controller;

class Topics {
    protected $data;
    protected $template;
    protected $config;
    
    public function __construct()
    {
        $this->config = \Suggestotron\Config::get('site');
        $this->data = new \Suggestotron\TopicData();
        $this->template = new \Suggestotron\Template($this->config['view_path'] . "/base.phtml");
    }

    public function listAction() {
        $topics = $this->data->getAllTopics();

        $this->render("index/list.phtml", ['topics' => $topics]);
    }

    public function addAction()
    {
        if (isset($_POST) && sizeof($_POST) > 0) {
            $this->data->add($_POST);
            header("Location: /");
            exit;
        }

        $this->render("index/add.phtml");
    }

    public function editAction()
    {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            if ($this->data->update($_POST)) {
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

        $topic = $this->data->getTopic($_GET['id']);

        if ($topic === false) {
            echo "Topic not found!";
            exit;
        }

        $this->render("index/edit.phtml", ['topic' => $topic]);
    }

    public function deleteAction()
    {
        if (!isset($_GET['id']) || empty($_GET['id'])) {
            echo "You did not pass in an ID.";
            exit;
        }

        $topic = $this->data->getTopic($_GET['id']);

        if ($topic === false) {
            echo "Topic not found!";
            exit;
        }

        if ($this->data->delete($_GET['id'])) {
            header("Location: /index.php");
            exit;
        } else {
            echo "An error occurred";
        }
    }

    protected function render($template, $data = array())
    {
        $this->template->render($this->config['view_path'] . "/" . $template, $data);
    }
}
?>