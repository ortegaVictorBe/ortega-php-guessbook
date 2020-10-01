<?php

declare(strict_types=1);
//require "model/autoload.php";
require "model/ConnectDB.php";
require "model/Subject.php";
require "model/Message.php";
require "model/Visitor.php";
require "model/GuestBook.php";


$guestBook = new GuestBook();
$userMessage="";


if ($_SERVER["REQUEST_METHOD"]=="POST" ){
    // validating
    $errMessage="";
    //validate author
    if (empty($_POST["name"]))
    {  $errMessage=$errMessage.", Author is empty";
    }else{
    $name=cleanInput($_POST["name"]); 
    }

    //Validate e-mail 
    if (empty($_POST["email"])){
        $errMessage=$errMessage."e-mail is empty !";
    }else{
     $email=cleanInput($_POST["email"]);
     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errMessage=$errMessage."Invalidate email !";
     } 
    }

    //Validating title
    if (empty($_POST["title"])){
        $errMessage=$errMessage.", Title is empty";
   }else{
    $title=cleanInput($_POST["title"]); 
   }
    
   //Validate content
   if (empty($_POST["content"])){
    $errMessage=$errMessage.", Content is empty";

    }else{

     $content=cleanInput($_POST["content"]); 
    }

    if (!empty($errMessage)){
        $errMessage="Please check and fix this issues :) : ".$errMessage;
        $errMessage= " <div class='alert alert-dismissible alert-danger'>     
        <h4 class='alert-heading'>Warning!</h4> 
        <p class='mb-0'>$errMessage
        </p> </div>";
   
        $userMessage=$errMessage;
    //    return false; 
      } else{
        // return true;
        $author=new Visitor($name,$email);
        $newPost= new Message($author,$title,$_POST["content"]);
        $guestBook->savePost($newPost); 
      }

    
}


function cleanInput($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
};

 require 'view/guestBookView.php';
?>