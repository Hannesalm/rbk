<?php
include(__DIR__.'/config.php');

CUser::logOut();

header('Location: index.php');