<?php

class CContent extends CDatabase{

    function __construct(){
        parent::__construct();
    }

    public function addPost($name, $content, $published){
        $params = array($name, $content, 'markdown', $published);
        $this->ExecuteQuery("INSERT INTO blog (name, content, filter, published) VALUES(?, ?, ?, ?);", $params);
    }

    public function getBlogContent(){

        $sql = "
        SELECT *
        FROM blog
        WHERE
          published <= NOW()
        ORDER BY published DESC
        LIMIT 5
        ;
        ";

        return $this->ExecuteSelectQueryAndFetchAll($sql);
    }
    public function getBlogContentForFirstPage(){

        $sql = "
        SELECT *
        FROM blog
        WHERE
          published <= NOW()
        ORDER BY published DESC
        LIMIT 3
        ;
        ";

        return $this->ExecuteSelectQueryAndFetchAll($sql);
    }

    public function drawBlogs($res){

        $items = null;
        if(CUser::isAuthenticated()){
            foreach($res AS $key => $val) {
                $content = $val->content;
                //$first=substr($content,0,1000);
                $val->published = date("| Y, M j, G:i");
                if($val->deleted == NULL){
                        $items .= "<div class='blogg-box'><p>$content</p><p class='pub'>Publiserad av: $val->name $val->published</p><a class='link' href='#'>Radera</a></div>\n";
                }
            }
            return $items;
        } else {
            foreach ($res AS $key => $val) {
                $content = $val->content;
                $val->published = date("| Y, M j, G:i");
                //$first=substr($content,0,1000);
                if ($val->deleted == NULL){
                        $items .= "<div class='blogg-box'><p>$content</p><p class='pub'>Publiserad av: $val->name $val->published</p></div>\n";
                }
            }
            return $items;
        }


    }
    public function drawBlogPosts($res){

        $items = null;
        if(CUser::isAuthenticated()){
            foreach($res AS $key => $val) {
                $content = $val->content;
                $first=substr($content,0,100);
                //$published = $val->published;
                $val->published = date("| Y, M j, G:i");
                if($val->deleted == NULL){
                    $items .= "<div class='box'><p>$first...</p><p class='pub'>Publiserad av: $val->name $val->published</p><a class='link' href='#'>Radera</a></div>\n";
                }
            }
            return $items;
        } else {
            foreach ($res AS $key => $val) {
                $val->published = date("| Y, M j, G:i");
                $content = $val->content;
                $first=substr($content,0,100);
                if ($val->deleted == NULL){
                    $items .= "<div class='box'><p>$first...</p></div>\n";
                }
            }
            return $items;
        }


    }

// ----------------------THE NEWS AREA---------------------------
    public function getNews(){

        $sql = "
        SELECT *
        FROM news
        WHERE
          published <= NOW()
        ORDER BY published DESC
        LIMIT 5
        ;
        ";

        return $this->ExecuteSelectQueryAndFetchAll($sql);
    }
    public function addNews($title, $content, $name, $published){
        $params = array($title, $content, 'markdown', $published, $name);
        $this->ExecuteQuery("INSERT INTO news (title, content, filter, published, name) VALUES(?, ?, ?, ?, ?);", $params);
    }
    public function drawNews($res){

        $items = null;
        if(CUser::isAuthenticated()){
            foreach($res AS $key => $val) {

                //$first=substr($content,0,255);
                $val->published = date("| Y, M j, G:i");
                if($val->deleted == NULL){
                    $items .= "<div class='box'><h2>$val->title</h2><p>$val->content</p><p class='pub'>Publiserad av: $val->name $val->published</p><a class='link' href='#'>Editera</a></div>\n";
                }
            }
            return $items;
        } else {
            foreach ($res AS $key => $val) {
                $val->published = date("| Y, M j, G:i");
                if ($val->deleted == NULL){
                    $items .= "<div class='box'><h2>$val->title</h2><p>$val->content</p><p class='pub'>Publiserad av: $val->name $val->published</p></div>\n";
                }
            }
            return $items;
        }


    }
    // ----------------------THE PAGE AREA---------------------------

    public function getPage($params){

        return $this->ExecuteSelectQueryAndFetchAll("SELECT content FROM pages WHERE id = ?;", $params);
    }

    public function updatePage($content, $id){
        $params = array($content, $id);

        $this->ExecuteQuery("UPDATE pages SET content = ? WHERE id = ?;", $params);
    }

}
