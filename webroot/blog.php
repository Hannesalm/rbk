<?php
/**
 * This is a Orange pagecontroller.
 *
 */
// Include the essential config-file which also creates the $Orange variable with its defaults.
include(__DIR__.'/config.php');

// Do it and store it all in variables in the Orange container.
$Orange['title'] = "Blogg";

$blog = new CContent();
$filter = new CTextFilter();

if(isset($_POST['blog'])){


    $name = $_POST['name'];
    $content = $_POST['content'];
    $content   = $filter->doFilter(htmlentities($content, null, 'UTF-8'), 'markdown');
    $published = date("Y-m-d H:i:s");
    $blog->addPost($name, $content, $published);

    header('Location: blog.php');
} else {

    $res = $blog->getBlogContent();
    $items = $blog->drawBlogs($res);

    $Orange['main'] = <<<EOD


<div class="blogg">
<div class="rubrik"><p class="undertext">Bloggposter</p></div>

$items

</div>
<div class="blogg-form">
<div class="rubrik"><p class="undertext">Skriv ett blogg inlägg</p></div>
<form method="post" action="blog.php">
   <p><label>Namn:<br/><input type='text' name='name' placeholder="Namn...."></label></p>
   <p><label>Meddelande:<br/><textarea name='content' placeholder="Max 1000 ord...."></textarea></label></p>
    <div class="add"><input type='submit' name='blog' value='Blogga'/></div>
</form>
</div>

EOD;
}

// Finally, leave it all to the rendering phase of Anax.
include(Orange_THEME_PATH);