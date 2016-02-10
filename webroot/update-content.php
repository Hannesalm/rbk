<?php

if(CUser::isAuthenticated()){

    $get_page = new CContent();
    $id = $_GET['p'];
    $params = array($id);
    $content = $get_page->getPage($params);

}