<!DOCTYPE html>
<head>
    <title>SK CMS</title>
    <meta charset="UTF-8">
    
    
    <link type="text/css" rel="stylesheet" href="<?php echo APP_RES; ?>css/sk_style.css" >
    <script type="text/javascript" src="<?php echo APP_RES; ?>javascript/jquery.js" ></script>
    
    <script>
        
        $(document).ready(function(){
            
            $('#sk_cancel').live('click', function(e){
                e.preventDefault();
                parent.$.colorbox.close();
            });
            
        });
        
    </script>
    
</head>

<body>