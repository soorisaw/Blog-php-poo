<?php

class Article {

	private int $id;
	private string $heading;
	private string $title;
	private string $picture;
	private string $wysiwyg;

    	//***********************************************CONSTRUCTOR******************************************************/
	public function __construct (array $data)
	{
		$ArticleManager = new ArticleManager;
		$ArticleManager->hydrate($data, $this);
	}

	/********************************************GUETTERS & SETTERS**************************************************/
	
	/**
	 * Get the value of id
	 */ 
	public function getId()
	{
		return $this->id;
	}
	/**
	 * Set the value of id
	 *
	 * @return  self
	 */ 
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * Get the value of heading
	 */ 
	public function getHeading()
	{
		return $this->heading;
	}
	/**
	 * Set the value of heading
	 *
	 * @return  self
	 */ 
	public function setHeading($heading)
	{
		$this->heading = html_entity_decode($heading);

		return $this;
	}

	/**
	 * Get the value of title
	 */ 
	public function getTitle()
	{
		return $this->title;
	}
	/**
	 * Set the value of title
	 *
	 * @return  self
	 */ 
	public function setTitle($title)
	{
		$this->title = html_entity_decode($title);

		return $this;
	}

	/**
	 * Get the value of picture
	 */ 
	public function getPicture()
	{
		return $this->picture;
	}
	/**
	 * Set the value of picture
	 *
	 * @return  self
	 */ 
	public function setPicture($picture)
	{
		$this->picture = $picture;

		return $this;
	}

	/**
	 * Get the value of wysiwyg
	 */ 
	public function getWysiwyg()
	{
		return $this->wysiwyg;
	}
	/**
	 * Set the value of wysiwyg
	 *
	 * @return  self
	 */ 
	public function setWysiwyg($wysiwyg)
	{
		$this->wysiwyg = html_entity_decode($wysiwyg);

		return $this;
	}
}