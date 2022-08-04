<?php

/**
 * TopicComment
 */
class TopicComment {

	private int $_commentId;
	private int $_topicId;
	private int $_userId;
	private $_commentDate;
	private $_commentHour;
	private string $_commentTopic;
	private string $_pseudo;
	private string $_avatar;

    	//***********************************************CONSTRUCTOR******************************************************/
	public function __construct (array $data)
	{
		$topicCommentManager = new TopicCommentManager;
		$topicCommentManager->hydrate($data, $this);
	}	    
	/********************************************GUETTERS & SETTERS**************************************************/
		
	/**
	 * getCommentId
	 *
	 * @return void
	 */
	public function getCommentId()
	{
		return $this->_commentId ;
	}    
	/**
	 * setCommentId
	 *
	 * @param  mixed $commentId
	 * @return void
	 */
	public function setCommentId($commentId)
	{
		$this->_commentId = $commentId ;
	}
		
	/**
	 * getTopicId
	 *
	 * @return void
	 */
	public function getTopicId()
	{
		return $this->_topicId ;
	}    
	/**
	 * setTopicId
	 *
	 * @param  mixed $topicId
	 * @return void
	 */
	public function setTopicId($topicId)
	{
		$this->_topicId = $topicId ;
	}
	
	/**
	 * getUserId
	 *
	 * @return void
	 */
	public function getUserId()
	{
		return $this->_userId ;
	}    
	/**
	 * setUserId
	 *
	 * @param  mixed $userId
	 * @return void
	 */
	public function setUserId($userId)
	{
		$this->_userId = $userId ;
	}
		
	/**
	 * getCommentDate
	 *
	 * @return void
	 */
	public function getCommentDate()
	{
		return $this->_commentDate ;
	}    
	/**
	 * setCommentDate
	 *
	 * @param  mixed $commentDate
	 * @return void
	 */
	public function setCommentDate($commentDate)
	{
		$date = date("d.m.Y", strtotime($commentDate));
		$this->_commentDate = $date;
		$hours = date("H:i", strtotime($commentDate));
		$this->_commentHours = $hours;
	}    
	/**
	 * getCommentHour
	 *
	 * @return void
	 */
	public function getCommentHour()
	{
		return $this->_commentHours ;
	}
		
	/**
	 * getCommentTopic
	 *
	 * @return void
	 */
	public function getCommentTopic()
	{
		return $this->_commentTopic ;
	}    
	public function setCommentTopic(string $commentTopic)
	{
		$this->_commentTopic = $commentTopic ;
	}

	public function getPseudo()
	{
		return $this->_pseudo ;
	}    
	public function setPseudo(string $pseudo)
	{
		$this->_pseudo = $pseudo ;
	}

	public function getAvatar()
	{
		return $this->_avatar ;
	}    
	public function setAvatar(string $avatar)
	{
		$this->_avatar = $avatar ;
	}
	
}