<?php
class NewsClass
{
    public $newsTitle; 
    public $newsDate; 
    public $newsContent; 
    public $newsComments;
   
    public function __construct($title, $date, $content)
    {
	  $this->newsTitle=$title;
	  $this->newsDate=$date;
	  $this->newsContent=$content;
	  $this->newsComments=array();
	  return true;
    } 
   
    public function postNews()
    {
    echo $this->newsDate.'<h2>'.$this->newsTitle.'</h2><p>'.$this->newsContent.'</p>';
	  return true;
    } 
   
    public function getComments()
    {
    return true;
    } 
   
    public function postComments()
    {	
    echo newsDate;
	  return true;
    } 
}

function getNews() {
    $json = file_get_contents('./news.json');
    $data = json_decode($json, true);
    return $data;
}

$newsarr = getNews();

if (count($newsarr)) {
    foreach ($newsarr as $i) {
        $news = new NewsClass($i['title'], $i['date'], $i['content']);
        $news->postNews();
    }
}
?>
