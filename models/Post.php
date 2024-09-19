<?php

class Post
{

    private $title;
    private $content;
    private $createdDate;

    private $category;

    public function __construct($title, $content, $createdDate, $category)
    {
        $this->title = $title;
        $this->content = $content;
        $this->createdDate = $createdDate;
        $this->category = $category;
    }

}