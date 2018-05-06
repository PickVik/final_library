<?php
    
  class book{
    
    public $ISBN;  
    public $Title;
    public $Type;
    public $Genre;
    public $Price;
    public $Borrow_status;
   
   public function __construct() {
       
    }
    
   public function __construct1( $ISBN,$Title, $Type, $Genre, $Price, $Borrow_status ) {
       
        $this->ISBN =  $ISBN;
        $this->title = $Title;
        $this->type =  $Type;
        $this->genre = $Genre;
        $this->price = $Price;
        $this->borrow_status= $Borrow_status;
   }
        function getISBN() {
          return $this->ISBN;
      }

      function getTitle() {
          return $this->Title;
      }

      function getType() {
          return $this->Type;
      }

      function getGenre() {
          return $this->Genre;
      }

      function getPrice() {
          return $this->Price;
      }

      function getBorrow_status() {
          return $this->Borrow_status;
      }

      function setISBN($ISBN) {
          $this->ISBN = $ISBN;
      }

      function setTitle($Title) {
          $this->Title = $Title;
      }

      function setType($Type) {
          $this->Type = $Type;
      }

      function setGenre($Genre) {
          $this->Genre = $Genre;
      }

      function setPrice($Price) {
          $this->Price = $Price;
      }

      function setBorrow_status($Borrow_status) {
          $this->Borrow_status = $Borrow_status;
      }
   
   }
  