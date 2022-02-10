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
    	$data = ["frozen" => "false", "record" => ["first_name" => $bean->first_name, "last_name" => $bean->last_name, "phone_home" => $bean->phone_mobile, "email" => $bean->email1, ]];
    	

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
