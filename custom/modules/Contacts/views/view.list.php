<?php

require_once('modules/Contacts/ContactsListViewSmarty.php');
require_once ("custom/application/Ext/PrvCloud/prv_cloud.ext.php");
class CustomContactsViewList extends ViewList
{
    

       
   function listViewProcess()        // generating listview 
    {

        $prv = new PrvCloudMethods();
        $p = $prv->listContainerRecords();
        foreach ($p as $d)
        {

            $contacts = $prv->listRecords($d->guid);
            //print_r( $contacts['record']->email);
            $contactArr[$d->guid] = ["email" => $contacts['record']->email, 'first_name' => $contacts['record']->first_name,'last_name' => $contacts['record']->last_name,'phone_home' => $contacts['record']->phone_home];
        }
        $this->lv->ss->assign('total', count($contactArr));
        $this->lv->ss->assign('contacts', $contactArr);
      
        $this->lv->setup($this->seed, 'custom/modules/Contacts/templates/list.tpl',$this->where, $this->params);
        echo $this->lv->display();
    }

    public function preDisplay()
    {
        

        $this->lv = new ListViewSmarty();
        $this->lv->export = false;
        $this->lv->showMassupdateFields = false;
    }
}
