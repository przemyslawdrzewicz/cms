<?php 

class Cms
{
    private $content_types = array('wysiwyg', 'textarea', 'oneline');
    private $SK;

    function __construct()
    {
        global $SK;
        $this->SK = & $SK;
    }

    function display_block($id, $type = 'wysiwyg')
    {
        $content = $this->load_block($id);
        
        if ($content == FALSE)
        {
            $this->create_block($id);
            $content = '';
        }

        if ($this->SK->Auth->checkloginStatus())
        {
            $edit_start = '<div class="sk_edit">';
            $edit_type = '<a class="sk_edit_type label label-inverse" href="' . SITE_PATH . 'app/cms/edit.php?id=' . $id . '&type=' . $type .'">' . $type . '</a>';
            $edit_link = '<a class="sk_edit_link label label-inverse" href="' . SITE_PATH . 'app/cms/edit.php?id=' . $id . '&type=' . $type .'">Edytuj blok</a>';
            $edit_end = '</div>';

            echo $edit_start . $edit_type;
            echo $edit_link . $content . $edit_end;
        }
        else
        {
            echo $content;
        }

    }

    function generate_field($type, $content)
    {
       
        if ($type == 'wysiwyg')
        {
            return '<textarea name="field" id="field" class="wysiwyg">'.$content . '</textarea>';
        }
        else if($type == 'textarea')
        {
            return '<textarea name="field" id="field" class="textarea">'.$content . '</textarea>'; 
        }
        else if($type == 'oneline')
        {
            return '<input name="field" id="field" class="oneline" value="'.$content . '">'; 
        }
        else
        {
            $error = '<p>Użyj właściwego typu treści</p>';
            return $error;
        }
    }

    function load_block($id)
    {
        if ($stmt = $this->SK->Database->prepare("SELECT content FROM content WHERE id=?"))
        {
            
            $stmt->bind_param('s', $id);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows != FALSE)
            {
                
                $stmt->bind_result($content);
                $stmt->fetch();
                $stmt->close();
                
                return $content;
            }
            else
            {
                
                $stmt->close();
                return FALSE;
                
            }
        }
    }

    function create_block($id)
    {
        
        if($stmt = $this->SK->Database->prepare("INSERT INTO `content` (`id`, `content`) VALUES (?, '')"))
        {

            $stmt->bind_param('s', $id);
            $stmt->execute();
            $stmt->close();
            
        }

    }

    function update_block($id, $content)
    {

        if($stmt = $this->SK->Database->prepare("UPDATE `content` SET `content` = ? WHERE `content`.`id` = ?"))
        {

            $stmt->bind_param('ss', $content, $id);
            $stmt->execute();
            $stmt->close();
            
        }

    }
}


//INSERT INTO `content` (`id`, `content`) VALUES ('sdfsdf', '');

//UPDATE `content` SET `content` = 'dfdgdfg' WHERE `content`.`id` = 'content-main';