<script>
    $(document).ready(function()
    {
        $('#edit').submit(function(e)
        {
            e.preventDefault();

            var id = "<?php echo $this->getData('block_id'); ?>";
            var type = $('#type').val();
            var content = $('#field').val();

            
            var dataString = 'id=' + id + '&field=' + content + '&type=' + type;

            $.ajax({
                type: "POST",
                url: "<?php echo SITE_PATH; ?>app/cms/edit.php",
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


        });

    });
</script>

<div class="form-wrapper">

    <form action="" method="post" id="edit" class="well">
        <legend>Edycja bloku: <i><?php echo $this->getData('block_id'); ?></i></legend>
        <?php echo $this->getData('cms_field'); ?>
        <input type="hidden" id="type" value="<?php echo $this->getData('block_type') ?>" />
        <hr />
        <input type="submit" name="submit" class="btn btn-primary" value="Wyślij"/>
        <a href="#" id="sk_cancel" class="btn">Wróć</a>
    </form>

</div>