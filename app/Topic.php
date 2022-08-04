<?php 

/**
 * Topic
 */
class Topic {

	private int $_topicId;
	private int $_userId;
	private string $_titleTopic;
	private $_dateCreation;

	//***********************************************CONSTRUCTOR******************************************************/

	public function __construct (array $data)
	{
		$topicManager = new TopicManager;
		$topicManager->hydrate($data, $this);
	}		

	/********************************************GUETTERS & SETTERS**************************************************/
		
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
	public function setTopicId(int $topicId)
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
	public function setUserId(int $userId)
	{
		$this->_userId = $userId ;
	}

	/**
	 * getTitleTopic
	 *
	 * @return void
	 */
	public function getTitleTopic()
	{
		return $this->_titleTopic ;
	}    
	/**
	 * setTitleTopic
	 *
	 * @param  mixed $titleTopic
	 * @return void
	 */
	public function setTitleTopic(string $titleTopic)
	{
		$this->_titleTopic = $titleTopic ;
	}

	/**
	 * getDateCreation
	 *
	 * @return void
	 */
	public function getDateCreation()
	{
		return $this->_dateCreation ;
	}    
	/**
	 * setDateCreation
	 *
	 * @param  mixed $dateCreation
	 * @return void
	 */
	public function setDateCreation($dateCreation)
	{
		$dateCreation = date("d.m.Y", strtotime($dateCreation));
		$this->_dateCreation = $dateCreation ;
	}
}