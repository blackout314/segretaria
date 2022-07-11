<?php
namespace blackout314\awe;

class RSSParser {
 
   /* define var $doc */
   protected $doc;

   /* define an array of items */
   protected $items = array();

   /* constructor of class */
   public function __construct() {

          /* create a new DOMDocument object */
          $this->doc = new \DOMDocument();
   }

   /**
     * 
     * @param (String) $url URL RSS to load.
     * @return none. load file into object $this->doc 
     */
   public function load($url) {

         //load RSS from a file
         $this->doc->load($url);          

      return $this;
   }

   /**
     *
     * @param none.
     * @return DOMNode
     */
   protected function getChannel() {

        /* Searches for all elements with tag name <channel> 
           and retrieve the first.
         */
        return $this->doc->getElementsByTagName('channel')->item(0);
   }

   /**
     * @param $reparse (Boolean) - reparse or not.
     * @return (Array of instance RSSItem) an array of objects by type RSSItem
     */
   public function getItems($reparse = false) {

        if(empty($this->items) || $reparse) {

                 $channel = $this->getChannel();

                 foreach($channel->getElementsByTagName('item') as $domItem) {

                         $this->items[] = $this->parseItem($domItem);  
                 }
        }

       return $this->items;
   }

   /**
     * Get a certain item from the items.
     * @param $i (Integer) an index for item.
     * @param (Object RSSItem) an instance of RSSItem or false if exists the item.
     */
   protected function getItem($i) {

          $items = $this->getItems();

          if(isset($items[$i])) {

                 return $items[$i];
          }

       return false;
   }

   /**
     * 
     * @param (DOMNode) $thetem - an object of DOMDocument that extend DOMNode.
     * @return (Object of RSSItem) - return an object item of RSSItem.
     */
   public function parseItem(\DOMNode $theitem) {

         $item = new \blackout314\awe\RSSItem();
         $item->setTitle($theitem->getElementsByTagName("title")->item(0)->firstChild->data)
              ->setLink($theitem->getElementsByTagName("link")->item(0)->firstChild->data)
              ->setDescription($theitem->getElementsByTagName("description")->item(0)->firstChild->data);

       return $item;
   }

    
}//end class RSSParse

?>
