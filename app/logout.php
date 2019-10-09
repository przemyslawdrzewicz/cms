<?php

include("init.php");

$SK->Auth->logout();

$SK->Template->redirect(SITE_PATH);