<?php

class TopicFull {

    private Topic $_topic;
    private array $_comment;

    public function _construct(Topic $topic, array $comment)
    {
        $this->_topic = $this->setTopic($topic);
        $this->_comment = $this->setComment($comment);
    }

    public function getTopic()
    {
        return $this->_topic ;
    }    
    public function setTopic(Topic $topic)
    {
        $this->_topic = $topic ;
    }

    public function getComment()
    {
        return $this->_comment ;
    }    
    public function setComment(array $comment)
    {
        $this->_comment = $comment ;
    }

}