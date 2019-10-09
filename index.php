<?php include("app/init.php"); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <title>DRZEWICZ CMS</title>
    <meta charset="utf-8">
    
    <link rel="stylesheet" type="text/css" href="app/res/css/sk_style.css" />
    
    <?php $SK->head(); ?>
</head>

<body>

    <?php $SK->toolbar(); ?>

	<div id="wrapper">
	    <div class="head-left">
	       <h1>CMS</h1>
	    </div>
        <div class="head-right"><?php $SK->login_link(); ?></div>
        
        <div class="clear"></div>
        
        <div class="navbar">
        <div class="navbar-inner">
        <ul class="nav">
        	<li><a href="#">Start</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">O nas</a></li>
            <li><a href="#">Kontakt</a></li>
        </ul>
        </div>
        </div>
        
        <div class="content row">
        	<div class="span9"  id="left-c">
            	<h2><?php $SK->Cms->display_block('content-header', 'oneline') ?></h2>
            	<hr>
                <div class="well">
                    <?php $SK->Cms->display_block('content-main') ?>
                </div>

            </div>

            <div class="span3" id="right-c">
                <div class="well right-content">
                    <?php $SK->Cms->display_block('content-right-first', 'textarea') ?>
                </div>
                <div class="well right-content">
                    <?php $SK->Cms->display_block('content-right-second', 'textarea') ?>
                </div>
            	<div class="">
                <img src="<?php SITE_PATH ?>app/res/images/right_cms.png" alt=""/>
                </div>
            </div>
        </div>
        
        <div id="footer">
        	&copy; 2019 Przemysław Drzewicz
        </div>
        
    </div>

</body>

</html>