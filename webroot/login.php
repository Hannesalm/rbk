<?php
/**
 * This is a Orange pagecontroller.
 *
 */
// Include the essential config-file which also creates the $Orange variable with its defaults.
include(__DIR__.'/config.php');



$Orange['title'] = "Startsida";
$message = "";

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = new CUser();
        $res = $user->login($username, $password);


        if ($res) {
            $user->setSessionVariablesAtLogin($res);
            $name = $user->getName();
            header('Location: login.php');
        } else {
            $message = "Wrong username or password";
        }
    }

if(CUser::isAuthenticated()){

    $message = "<p>Inloggad som: " . CUser::getName();
    $Orange['main'] = <<<EOD

        <h1></h1>
        <fieldset>
        <legend>Login</legend>
        <p>{$message}</p>
        </fieldset>
        </form>
EOD;
} else {
    $Orange['main'] = <<<EOD

        <h1></h1>
        <fieldset>
        <legend>Login</legend>
        <p>{$message}</p>
        <div class="form">
        <form method="post" action="login.php">
            <input input type='text' name='username' placeholder="Användarnamn....">
            <br>
            <input type='password' name='password' placeholder="Lösenord....">
        <br><br>
        <div class="add"><input type='submit' name='submit' value='Login'/></div>
        </fieldset>
        </form>
        </div>
EOD;
}


// Finally, leave it all to the rendering phase of Orange.
include(Orange_THEME_PATH);