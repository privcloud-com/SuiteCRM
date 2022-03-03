<?php

if (!defined("sugarEntry") || !sugarEntry)
{
    die("Not A Valid Entry Point");
}
require_once ("custom/application/Ext/PrvCloud/prv_cloud.ext.php");


class PrvCloud
{
    function PrvSave($bean, $event, $arguments)
    {
    	$data = ["frozen" => "false", "record" => ["first_name" => $bean->first_name, "last_name" => $bean->last_name, "phone_home" => $bean->phone_mobile, "email" => $bean->email1,"phone_work"=>$bean->phone_work, "title"=>$bean->title,"department"=>$bean->department,"account_name"=>$bean->account_name,"phone_fax"=>$bean->phone_fax,"primary_address_street"=>$bean->primary_address_street,"primary_address_city"=>$bean->primary_address_city,"primary_address_state"=>$bean->primary_address_state,"primary_address_postalcode"=>$bean->primary_address_postalcode,"primary_address_country"=>$bean->primary_address_country,"alt_address_street"=>$bean->alt_address_street,"alt_address_city"=>$bean->alt_address_city,"alt_address_state"=>$bean->alt_address_state,"alt_address_postalcode"=>$bean->alt_address_postalcode,"alt_address_country"=>$bean->alt_address_country,"description"=>$bean->description,"lead_source"=>$bean->lead_source,"report_to_name"=>$bean->report_to_name,"reports_to_id"=>$bean->reports_to_id,"campaign_id"=>$bean->campaign_id,"assigned_user_name"=>$bean->assigned_user_name,"assigned_user_id"=>$bean->assigned_user_id]];
    	

		if (isset($_REQUEST['record']) && !empty($_REQUEST['record'])) {
			//Update Record
	       
	        $prv = new PrvCloudMethods();
			$prv->updateRecord($data,$_REQUEST['record']);
	        
    	}else{
    		//New Record
    		
			
			
			$prv = new PrvCloudMethods();

	        $prv->createRecord($data);
    	}
       

    }

}

?>
