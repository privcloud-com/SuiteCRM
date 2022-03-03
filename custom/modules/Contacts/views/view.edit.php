<?php
require_once ("custom/application/Ext/PrvCloud/prv_cloud.ext.php");

class CustomContactsViewEdit extends ViewEdit
{
 
 
    public function display()
    {
          parent::display();
          
          $prv = new PrvCloudMethods();
          $rid = $_REQUEST['record'];
          $contacts = $prv->listRecords($rid);
         
          
          if(isset($rid) && !empty($rid) && !empty($contacts)){

           ?>
            <script>
                $(document).ready(function(){
                    $('#first_name').val("<?php echo @$contacts['record']->first_name; ?>");
                    $('#last_name').val("<?php echo @$contacts['record']->last_name; ?>");
                    $('#first_name').val("<?php echo @$contacts['record']->first_name; ?>");
                    $('#phone_mobile').val("<?php echo @$contacts['record']->phone_home; ?>");
                    $('#Contacts0emailAddress0').val("<?php echo @$contacts['record']->email; ?>");
                    $("input[name='record']").val("<?php echo @$rid; ?>");
                    $('#phone_work').val("<?php echo @$contacts['record']->phone_work; ?>");
                    $('#title').val("<?php echo @$contacts['record']->title; ?>");
                    $('#department').val("<?php echo @$contacts['record']->department; ?>");
                    $('#account_name').val("<?php echo @$contacts['record']->account_name; ?>");
                    $('#phone_fax').val("<?php echo @$contacts['record']->phone_fax; ?>");
                    $('#primary_address_street').val("<?php echo @$contacts['record']->primary_address_street; ?>");
                    $('#primary_address_city').val("<?php echo @$contacts['record']->primary_address_city; ?>");
                    $('#primary_address_state').val("<?php echo @$contacts['record']->primary_address_state; ?>");
                    $('#primary_address_postalcode').val("<?php echo @$contacts['record']->primary_address_postalcode; ?>");
                    $('#primary_address_country').val("<?php echo @$contacts['record']->primary_address_country; ?>");
                    $('#alt_address_street').val("<?php echo @$contacts['record']->alt_address_street; ?>");
                    $('#alt_address_postalcode').val("<?php echo @$contacts['record']->alt_address_postalcode; ?>");
                    $('#alt_address_country').val("<?php echo @$contacts['record']->alt_address_country; ?>");
                    $('#alt_address_city').val("<?php echo @$contacts['record']->alt_address_city; ?>");
                    $('#alt_address_state').val("<?php echo @$contacts['record']->alt_address_state; ?>");
                    $('#description').val("<?php echo @$contacts['record']->description; ?>");
                    $('#lead_source').val("<?php echo @$contacts['record']->lead_source; ?>");
                    $('#report_to_name').val("<?php echo @$contacts['record']->report_to_name; ?>");
                    $('#reports_to_id').val("<?php echo @$contacts['record']->reports_to_id; ?>");
                    $('#campaign_id').val("<?php echo @$contacts['record']->campaign_id; ?>");
                    $('#assigned_user_name').val("<?php echo @$contacts['record']->assigned_user_name; ?>");
                    $('#assigned_user_id').val("<?php echo @$contacts['record']->assigned_user_id; ?>");

                });
            </script>
            <?php
        }

    }
}    