<?php

include("../init.php");

$SK->Auth->checkAuthorization();

if(isset($_POST['field']))
{
    $id = $_POST['id'];
    $type = htmlentities($_POST['type'], ENT_QUOTES);
    $content = $_POST['field'];
    $SK->Cms->update_block($id, $content);

    
    $SK->Template->load(APP_PATH . "cms/views/v_saving.php");
}
else
{
    
    if(isset($_GET['id']) == FALSE || isset($_GET['type']) == FALSE)
    {
        $SK->Template->error();
        exit;
    }
    
    $id = $_GET['id'];
    $type = htmlentities($_GET['type'], ENT_QUOTES);
    $content = $SK->Cms->load_block($id);

    $SK->Template->setData('block_id', $id);
    $SK->Template->setData('block_type', $type);
    $SK->Template->setData('cms_field', $SK->Cms->generate_field($type, $content), false);

    $SK->Template->load(APP_PATH . 'cms/views/v_edit.php');
}