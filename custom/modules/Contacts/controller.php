<?php
if (!defined('sugarEntry') || !sugarEntry) {
    die('Not A Valid Entry Point');
}

require_once('include/MVC/Controller/SugarController.php');
require_once ("custom/application/Ext/PrvCloud/prv_cloud.ext.php");
class ContactsController extends SugarController
{
	public function action_prvdel()
    {
    	$prv = new PrvCloudMethods();
    	$del=$_REQUEST['dt'];
    	foreach($del as $re){
    		
			$prv->deleteRecord($re);
    	}
	    SugarApplication::appendSuccessMessage("Record Deleted!");	
	  	echo 1;
	  	die;
    }
}