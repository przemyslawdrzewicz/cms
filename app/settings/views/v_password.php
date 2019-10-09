<?php
    $this->load(APP_PATH . 'core/templates/t_page_head.php');
?>

<div class="panel-wrapper">

    <h1>Ustawienia</h1>
    <a href="#" id="sk_cancel" class="btn btn-succes b-close">Zamknij</a>
    
    
    <div class="sk-panel-left">
        <ul class="nav nav-tabs nav-stacked">
            <li><a href="<?php SITE_PATH ?>../panel/index.php">Start</a></li>
            <li><a href="<?php SITE_PATH ?>../settings/password.php">Zmień hasło</a></li>
            <li><a href="<?php SITE_PATH ?>../panel/index.php">Użytkownicy</a></li>
            <li><a href="<?php SITE_PATH ?>../panel/index.php">Opcje</a></li>
        </ul>
    </div>
    <div class="sk-panel-right">
        <h2>Zmień hasło</h2>
        <form action="#" method="post" id="edit">
            <div>
            <?php
                $alerts = $this->getAlerts();
                if($alerts != '') {
                    echo '<ul class="alerts">' . $alerts . '</ul>';
                }
            ?>
            </div>
            
            <label for="oldpass">Stare hasło</label>
            <input type="password" name="oldpass" id="oldpass" value="<?php echo $this->getData('oldpass'); ?>"/>
            
            <label for="newpass">Nowe hasło</label>
            <input type="password" name="newpass" id="newpass" value="<?php echo $this->getData('newpass'); ?>"/>
            
            <label for="newpass2">Powtórz nowe hasło</label>
            <input type="password" name="newpass2" id="newpass2" value="<?php echo $this->getData('newpass2'); ?>"/>
            
            <br><br>
            
            <input type="submit" name="submit" class="btn btn-primary" value="Wyslij"/>
            
        </form>
    </div>

</div>

<?php
    $this->load(APP_PATH . 'core/templates/t_page_foot.php');
?>