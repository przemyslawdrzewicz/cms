<script>
    $(document).ready(function()
    {
        $('#login').submit(function(e)
        {
            e.preventDefault();

            var username = $('input#username').val();
            var password = $('input#password').val();

            var dataString = 'username=' + username + '&password=' + password;
 
            $.ajax({
                type: "POST",
                url: "<?php echo SITE_PATH; ?>app/login.php",
                data: dataString,
                cache: false,
                success: function(html){
                    $('#cboxLoadedContent').html(html);
                }
                
            });
        });

        $('#sk_cancel').live('click', function(e)
        {
            e.preventDefault();

            $.colorbox.close();

            var page = window.location.href;
            page = page.substring(0, page.lastIndexOf('?'));
            window.location = page;
        });

    });
</script>

<div class="form-wrapper form-horizontal well">
        <form action="" method="post" id="login">
        <div>
            <div>
               <a href="#" id="sk_cancel" class="cancel btn btn-success">Zamknij</a>
            </div>
            <div style="clear: both";></div>
            <?php 
                $alerts = $this->getAlerts();
                if($alerts != '')
                {
                    echo '<ul class="alerts">' . $alerts .'</ul>';
                }
            ?>
        </div>
            <p>
                <label for="username">Użytkownik: </label>
                <input type="text" name="username" id="username" value="<?php echo $this->getData('input_user'); ?>" />
            </p>
            <p>
                <label for="password">Hasło: </label>
                <input type="password" name="password" id="password" value="<?php echo $this->getData('input_pass'); ?>" />
            </p>
            <p>
                <input type="submit" name="submit" class="submit btn btn-primary" value="Wyślij">
            </p>
        </form>
</div>
