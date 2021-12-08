<?php

namespace Main;

class Article
{
    protected $tille;
    protected $id;
    protected $content;

    /**
     * @param $tille
     * @param $id
     * @param $content
     */
    public function __construct(string $tille, int $id, string $content)
    {
        $this->tille = $tille;
        $this->id = $id;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getTille():string
    {
        return $this->tille;
    }

    /**
     * @param string $tille
     */
    public function setTille(string  $tille)
    {
        $this->tille = $tille;
    }

    /**
     * @return int
     */
    public function getId():int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id):bool
    {
        $this->id = $id;
        return true;
    }

    /**
     * @return mixed
     */
    public function getContent():string
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content):bool
    {
        $this->content = $content;
        return true;
    }

    public function view(): string {
       return "
       <h1>" . $this->tille . "</h1>
       <h2>" . self::class . "</h2>
       <p> " . $this->content . " </p>
       ";
    }

}

class SpecialArticle extends  Article{
//    public function view(): string {
//        return "
//       <h1>" . $this->tille . "</h1>
//       <h2>" . static::class . "</h2>
//       <p> " . $this->content . " </p>
//       ";
//    }
}