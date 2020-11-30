<?php namespace ProcessWire;

class openGraph{

  private $homepage;
  private $defaultimg;
  private $hometitle;

  //settings
  private $maxSummaryLen=160;
  private $imgW=1200;
  private $imgH=628;

  public function __construct($page,$pages,$defaultimg=false,$hometitle=false){

    $this->homepage=$pages->get(1);
    if ($defaultimg){
      $this->defaultimg=$defaultimg;
    }
    if ($hometitle){
      $this->hometitle=$hometitle;
    } else {
      $this->hometitle=$this->homepage->title;
    }

    echo $this->tags($page);
  }

  private function getField($name,$page){
    switch($name){
      case "title":

        if ($page==$this->homepage){
          if ($page->title==$this->hometitle){
            return $page->title;
          } else {
            return $page->title.' | '.$this->hometitle;
          }

        } else{
            return $page->title.' | '.$this->hometitle;
        }
        break;

      case "description":
        if ($page->summary){
          return $page->summary;
        } elseif ($page->body) {
          $body=strip_tags($page->body);
          if (strlen($body)>$this->maxSummaryLen){
            return substr($body, 0, $this->maxSummaryLen);
          } else {
            return $body;
          }
        } else {
          $body=strip_tags($this->homepage->body);
          if (strlen($body)>$this->maxSummaryLen){
            return substr($body, 0, $this->maxSummaryLen);
          } else {
            return $body;
          }
        }
      break;

      case "image":
        if ($page->image){
          return $page->image->size($this->imgW,$this->imgH)->httpUrl;
        }
        if ($page->imagen){
          return $page->imagen->size($this->imgW,$this->imgH)->httpUrl;
        }
        if ($page->images){
          if ($page->images->count()>0){
            return $page->images->first()->size($this->imgW,$this->imgH)->httpUrl;
          }
        }
        if ($page->imagenes){
          if ($page->imagenes->count()>0){
            return $page->imagenes->first()->size($this->imgW,$this->imgH)->httpUrl;
          }
        }
        if ($this->defaultimg){
          return $this->homepage->httpUrl.$this->defaultimg;
        } else {
          return "";
        }
      break;

      case "url":
        return $page->httpUrl;
      break;
    }
  }

  public function tags($page){

    $HTML='';
    $HTML.='<title>'.$this->getField("title",$page).'</title>';
    $HTML.='<meta name="description" content="'.$this->getField("description",$page).'" />';
    $HTML.='<meta property="og:title" content="'.$this->getField("title",$page).'">';
    $HTML.='<meta property="og:description" content="'.$this->getField("description",$page).'">';
    $HTML.='<meta property="og:image" content="'.$this->getField("image",$page).'">';
    $HTML.='<meta property="og:url" content="'.$this->getField("url",$page).'">';
    $HTML.='<meta name="twitter:card" content="summary_large_image">';

    $HTML.='<meta property="og:site_name" content="'.$this->getField("title",$page).'">';

    $HTML.='<meta name="description" content="'.$this->getField("description",$page).'" />';
    return $HTML;
  }
}
