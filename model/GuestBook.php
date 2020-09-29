<?php

class GuestBook{
    private $post;
    private $messages=[];
    const FILE_NAME = 'model/data/posts.json';
    
    public function __construct(){
        $this->loadPosts();
    }
 
    public function loadPosts(){
    //Loading file
    $myJson=file_get_contents(self::FILE_NAME);
    $this->messages=unserialize(json_decode($myJson));    
    }

    public function savePost($post){
   //Saving the posts
   array_push($this->messages,$post);
   $myJson=json_encode(serialize($this->messages));
   file_put_contents(self::FILE_NAME,$myJson);         

    }
    /**
     * Get the value of messages
     */ 
    public function getMessages()
    {
        $messagesToShow="";
        $messageOrdered=array_reverse($this->messages);
      foreach ($messageOrdered as $index => $oneMessage) {
         if ($index < 20)
         {  
            $title=$oneMessage->getTitle();
            $content=$oneMessage->getContent();
            $author=$oneMessage->getAuthor()->getName();
            $email=$oneMessage->getAuthor()->getEmail();            
            $datePost=date("l d/m/Y",$oneMessage->getDatePost());
            
          
            $messagesToShow=$messagesToShow."<div class='card text-white bg-secondary mb-3' >
            <div class='card-header'>$author - $datePost</div>
            <div class='card-body'>
                <h4 class='card-title'>$title</h4>
                <p class='card-text'>$content</p>
            </div>
            </div>";
         }
      }

      return $messagesToShow ;        
    }
}
?>