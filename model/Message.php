<?php
class Message{
    private $title;
    private $datePost;
    private $content;
    private $author;

    public function __construct($author, $title, $content){
      $this->title=$title;
      $this->content=$content;
      $this->author=$author;
      $this->datePost=date(" l d/m/Y h:i a"); }


    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get the value of datePost
     */ 
    public function getDatePost()
    {
        return $this->datePost;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }
}
?>