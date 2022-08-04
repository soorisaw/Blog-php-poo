<?php

class ForumController extends Controller
{
    public function index()
    {
       	$topicManager = new TopicManager();
        $topics = $topicManager->getAllTopic();

        $form = new Form();
        $form->topicForm();
        $topicForm = $form->create();
        $fields = explode("*",$topicForm);
        $this->render(PATH_BLOG . 'forum/index.php', 
            [
                'posts' => $topics,
                'topicForm' => $fields
            ]);
    }

    public function newtopic()
    {
        $topicManager = new TopicManager();
        $topicManager->newTopic();
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }

    public function fulltopic($id)
    {     
        $topicManager = new TopicManager();
        $topic = $topicManager->getOneTopic($id);
        
        $CommentManager = new TopicCommentManager();
        $CommentManager->newTopicComment($id);

        $topicCommentManager = new TopicCommentManager();
        $allComment = $topicCommentManager->getAllComment($id);

        $form = new Form();
        $form->topicCommentForm();
        $topicCommentForm = $form->create();
        $fields = explode("*",$topicCommentForm);

	    $this->render(PATH_BLOG . 'forum/topic/index.php', 
        [
            'posts' => $allComment, 
            'topic' => $topic,
            'commentForm' => $fields
        ]);
    }

    public function newcom($id)
    {
        $CommentManager = new TopicCommentManager();
        $CommentManager->newTopicComment($id);
        header('Location: '. $_SERVER['HTTP_REFERER']);
    }

}
