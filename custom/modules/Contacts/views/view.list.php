<?php

require_once('modules/Contacts/ContactsListViewSmarty.php');
require_once ("custom/application/Ext/PrvCloud/prv_cloud.ext.php");
class CustomContactsViewList extends ViewList
{
    

    /*   
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
    }*/
    function listViewProcess()        // generating listview 
    {
        
        $prv = new PrvCloudMethods();
        $p = $prv->listContainerRecords();
        foreach ($p as $d)
        {
            $allRecord[]=$d->guid;
         
        }
        

        $offset=0;
        $currpg=0;
        $limit=-1;
        $nextOffset = -1;
        $prevOffset = -1;
        $endOffset = -1;
        $lastOffsetOnPage=0;
        $limit=10;
        if(isset($_REQUEST['nextp']) && !empty($_REQUEST['nextp'])){
            $currpg=$_REQUEST['nextp'];
            $offset=$_REQUEST['nextp'];
        }
        
       
        $dl=array_slice($allRecord,$currpg, $limit);
        $contacts_list=$prv->listBulkRecords($dl);

        
         /*Pagination*/
        
        $totalCount =count( $allRecord);
        $total_pages = ceil($totalCount / $limit);

        if ($totalCount > $limit) {
            $nextOffset = $offset + $limit;
            $prvOffset = $offset - $limit;
            if($nextOffset>$totalCount)
                $lastOffsetOnPage=$totalCount;
            else
                $lastOffsetOnPage=$nextOffset;

        }
        $endOffset = (floor(($totalCount - 1) / $limit)) * $limit;
        //$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $actual_link ="index.php?module=Contacts&action=ListView";
        if($nextOffset < $totalCount)
            $pageData['urls'] = array('nextPage'=>$actual_link."&nextp=".$nextOffset);
        if($prvOffset >=0  )
            $pageData['urls']['prevPage'] =$actual_link."&nextp=".$prvOffset;
        $pageData['offsets'] = array( 'lastOffsetOnPage'=>$lastOffsetOnPage,'current'=>$offset, 'next'=>$nextOffset, 'prev'=>$prevOffset, 'end'=>$endOffset, 'total'=>$totalCount, 'totalCounted'=>$totalCounted);
        /**Pag*/

        $this->lv->ss->assign('total', count( $allRecord));
        $this->lv->ss->assign('contacts',  $contacts_list);
        $this->lv->ss->assign('pageData1',  $pageData);
      
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
