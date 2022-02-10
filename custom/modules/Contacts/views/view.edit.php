<?php
require_once ("custom/application/Ext/PrvCloud/prv_cloud.ext.php");

class CustomContactsViewEdit extends ViewEdit
{
 
 
    public function display()
    {
          parent::display();
          $this->bean->last_name ='rr';
          $prv = new PrvCloudMethods();
          $rid = $_REQUEST['record'];
          $contacts = $prv->listRecords($rid);
          
          if(isset($rid) && !empty($rid) && !empty($contacts)){

           ?>
            <script>
                $(document).ready(function(){
                    $('#first_name').val("<?php echo $contacts['record']->first_name; ?>");
                    $('#last_name').val("<?php echo $contacts['record']->last_name; ?>");
                    $('#first_name').val("<?php echo $contacts['record']->first_name; ?>");
                    $('#phone_mobile').val("<?php echo $contacts['record']->phone_home; ?>");
                    $('#Contacts0emailAddress0').val("<?php echo $contacts['record']->email; ?>");
                    $("input[name='record']").val("<?php echo $rid; ?>");
                });
            </script>
            <?php
        }

    }
}    