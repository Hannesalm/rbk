<?php
include(__DIR__.'/config.php');

/**
 * CMovieSearch constructor.
 * @var CDatabase $db
 */

if(isset($_POST['add'])){
    $news = new CContent();
    $name = $_POST['name'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $published = $_POST['pub'];

    $news->addNews($title, $content, $name, $published);
    header('Location: index.php');
} else {
    $Orange['main'] = <<<EOD
    <h1></h1>
    <div class="form">
    <form method=post action="add-news.php">
              <fieldset>
              <legend>ADD NEWS</legend>
              <p><label>Titel:<br/><input type='text' name='title' placeholder="Title...."></label></p>
              <p><label>Text:<br/><textarea name='content' placeholder="Meddelande...."></textarea></label></p>
              <p><label>Namn:<br/><input type='text' name='name' placeholder="Namn...."></label></p>
              <p><label>Published:<br/><input type='date' name='pub' placeholder="Published...."></label></p>
              <div class="add"><input type='submit' name='add' value='Publisera'></div>
              </fieldset>
            </form>
        </fieldset>
</form>
</div>
EOD;

}


// Finally, leave it all to the rendering phase of Orange.
include(Orange_THEME_PATH);