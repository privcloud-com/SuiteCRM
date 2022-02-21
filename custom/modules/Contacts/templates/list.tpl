
    <table cellpadding='0' cellspacing='0' width='100%' border='0' class='list view table'>
        <thead>
         
        <tr height='20'>
            <th  class="td_alt"></th>
            <th></th>
            <th  class="td_alt">Name</th>
            <th  class="td_alt">Email</th>
            <th  class="td_alt">Phone</th>
        </tr>
        </thead>
      
        {if count($contacts) > 0}
        <tbody>
        <tr><td class="paginationActionButtons paginationTable" colspan="5">
        <input type="button" value="Delete" id="prv_del"> </td></tr>
    {foreach name=rowIteration from=$contacts key=id item=rowData}
        <tr height="20" class="oddListRowS1">
        
							<td><input title="{sugar_translate label='LBL_SELECT_THIS_ROW_TITLE'}"
                                    type='checkbox'
                                   class='checkbox' name='mass[]' value='{$id}'></td>
                            <td>
                        							<a class="edit-link" title="Edit" id="edit-39269b72-0276-0d7d-2ce3-61f28e72b4aa" href="index.php?module=Contacts&amp;return_module=Contacts&amp;action=EditView&amp;record={$id}">
                                								<span class="suitepicon suitepicon-action-edit"></span></a>
                        					</td>       
							<td>{$rowData->record->first_name} {$rowData->record->last_name}</td>
							<td>{$rowData->record->email}</td>
							<td>{$rowData->record->phone_home}</td>
		    	</tr>
	{/foreach}

        </tbody>
<tr id='pagination' class="pagination-unique" role='presentation'>
		<td colspan='{if $prerow}{$colCount+1}{else}{$colCount}{/if}'>
			<table border='0' cellpadding='0' cellspacing='0' width='100%' class='paginationTable'>
				<tr>
					<td nowrap="nowrap" class='paginationActionButtons'>
						
					</td>
					<td  nowrap='nowrap' align="right" class='paginationChangeButtons' width="1%">
						
						{if $pageData1.urls.prevPage}
							<button type='button' id='listViewPrevButton_{$action_menu_location}' name='listViewPrevButton' title='{$navStrings.previous}' class='list-view-pagination-button' onClick='location.href="{$pageData1.urls.prevPage}"'>
								<span class='suitepicon suitepicon-action-left'></span>
							</button>
						{else}
							<button type='button' id='listViewPrevButton_{$action_menu_location}' name='listViewPrevButton' class='list-view-pagination-button' title='{$navStrings.previous}' disabled='disabled'>
								<span class='suitepicon suitepicon-action-left'></span>
							</button>
						{/if}
					</td>
					<td nowrap='nowrap' width="1%" class="paginationActionButtons">

						<div class='pageNumbers'>({if $pageData1.offsets.lastOffsetOnPage == 0}0{else}{$pageData1.offsets.current+1}{/if} - {$pageData1.offsets.lastOffsetOnPage} {$navStrings.of} {if $pageData1.offsets.totalCounted}{$pageData1.offsets.total}{else}{$pageData1.offsets.total}{if $pageData1.offsets.lastOffsetOnPage != $pageData1.offsets.total}+{/if}{/if})</div>
					
					</td>
					<td nowrap='nowrap' align="right" class='paginationActionButtons' width="1%">
						{if $pageData1.urls.nextPage}
							<button type='button' id='listViewNextButton_{$action_menu_location}' name='listViewNextButton' title='{$navStrings.next}' class='list-view-pagination-button'  onClick='location.href="{$pageData1.urls.nextPage}"'>
								<span class='suitepicon suitepicon-action-right'></span>
							</button>
						{else}
							<button type='button' id='listViewNextButton_{$action_menu_location}' name='listViewNextButton' class='list-view-pagination-button' title='{$navStrings.next}' disabled='disabled'>
								<span class='suitepicon suitepicon-action-right'></span>
							</button>
						{/if}
						<input type="hidden" id="off_set" name="off_set" value="">
					</td>
					<td nowrap='nowrap' width="4px" class="paginationActionButtons"></td>
				</tr>
			</table>
		</td>
	</tr>

    </table>
{/if}

<script type="text/javascript">
 {literal}
 $(document).ready(function () {
 $("#prv_del").click(function(){
 var result = confirm("Want to delete?");
if (result) {
var values = $("input[name='mass[]']:checked")
              .map(function(){return $(this).val();}).get();
  the_data=values;

  $.ajax({
            type: "POST",
            url: "index.php?module=Contacts&action=prvdel",
            data: {"dt":the_data},
            dataType: "json",
            success: function(data){

              location.reload(true);
   
            }
        });
}
});

 

 });
 function pagination_ls(id,v){
$("#off_set").val(id);
 $.ajax({
            type: "POST",
            url: "index.php?entryPoint=ajax_1",
            data: {"dt":the_data},
            dataType: "json",
            success: function(data){

              location.reload(true);
   
            }
        });
}
 {/literal}
</script>