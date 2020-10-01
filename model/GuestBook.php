<?php

class GuestBook{
    private $conn;
    private $messages=[];    
    
    public function __construct(){
        $this->conn=new ConnectDB_MySql();
        $this->loadPosts();
    }
 
    public function loadPosts(){        

        //Selecting from the DataBase
        $handle = $this->conn->getPdo()->prepare('SELECT message FROM post');         
        $handle->execute();
        $serializedPosts=$handle->fetchAll();
        foreach ($serializedPosts as $key=>$onePost) {
            $oneMessage=$onePost["message"]; 
            array_push($this->messages,unserialize(json_decode($oneMessage)));
        } 
        
    }

    public function savePost($post){
        //Saving the posts        
        array_push($this->messages,$post);
        //INnsert Into Database                 
        $serializedPost=json_encode(serialize($post));
        $handle = $this->conn->getPdo()->prepare("INSERT INTO post (message) VALUES(:m)");         
        $handle->bindValue(':m', $serializedPost);
        $handle->execute();


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
            $datePost=$oneMessage->getDatePost();
            
          
            $messagesToShow=$messagesToShow."<div class='card text-white bg-secondary mb-3' >
            <div class='card-header'><span><img class='img-responsive' src='./img/user_p.png'></span><span> $author ($email) - $datePost</span></div>
            <div class='card-body'>
                <h4 class='card-title'><span><img class='img-responsive' src='./img/chat_p.png'></span>  $title</h4>
                <p class='card-text'>$content</p>
            </div>
            </div>";
         }
      }

      return $messagesToShow ;        
    }
}
?>