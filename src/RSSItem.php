<?php
namespace blackout314\awe;

class RSSItem {

   //(String) title RSS item
   protected $title;

   //(String) link RSS item
   protected $link;

   //(String) description of RSS item
   protected $description;

   //get the title
   //@return (String) title of item
   public function getTitle(){
 
         return $this->title;
   }

   //set the title with new title and return this object
   //@param (String) $newTitle of item
   public function setTitle($newTitle) {

         $this->title = $newTitle;

       return $this;
   }

   //get the link of the item
   //@return (String) $link link of item
   public function getLink() {

         return $this->link;
   }

   //set newlink of the item and return this object
   //@param (String) $newLink
   //@return this object.
   public function setLink($newLink) {

         $this->link = $newLink;

      return $this;
   }

   //get description of the item
   //@return (String) description of item
   public function getDescription() {

         return $this->description;
   }

   //set new description for that item and return this object
   public function setDescription($newDesc) {

         $this->description = $newDesc;

      return $this;
   }

   //return an array with title, link and description
   public function toArray() {

         return array('title'=> $this->getTitle(),
                      'link'=> $this->getLink(),
                      'description'=> $this->getDescription());  
   }
}
