<?php
include(__DIR__.'/config.php');

/**
 * CMovieSearch constructor.
 * @var CDatabase $db
 */
$Orange['title'] = "Lägg till innehåll";

$get_page = new CContent();
$id = $_GET['p'];
$params = array($id);
$content = $get_page->getPage($params);

if(CUser::isAuthenticated()){

    if(isset($_POST['update'])){
        $updatedContent = $_POST['content'];
        $get_page->updatePage($updatedContent, $content[0]->id);
        header('Location: add-content.php');
    }

    //$page = $_POST['page'];

    $item = $content[0]->content;
    $Orange['main'] = <<<EOD

    <div class="form">
    <form method=post action="add-content.php?=$id">
              <fieldset>
              <legend>Uppdatera innehåll</legend>
              <p><label>Text:<br/><textarea name='content'>$item</textarea></label></p>
              <div class="add"><input type='submit' name='update' value='Uppdatera'></div>
              </fieldset>
            </form>
        </fieldset>
</form>
</div>

EOD;
    } else {
    header('Location: login.php');
}



// Finally, leave it all to the rendering phase of Orange.
include(Orange_THEME_PATH);