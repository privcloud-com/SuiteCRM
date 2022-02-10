
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
        <input type="button" value="Delete" id="prv_del"> ({$total})</td></tr>
    {foreach name=rowIteration from=$contacts key=id item=rowData}
        <tr height="20" class="oddListRowS1">
        
							<td><input title="{sugar_translate label='LBL_SELECT_THIS_ROW_TITLE'}"
                                    type='checkbox'
                                   class='checkbox' name='mass[]' value='{$id}'></td>
                            <td>
                        							<a class="edit-link" title="Edit" id="edit-39269b72-0276-0d7d-2ce3-61f28e72b4aa" href="index.php?module=Contacts&amp;return_module=Contacts&amp;action=EditView&amp;record={$id}">
                                								<span class="suitepicon suitepicon-action-edit"></span></a>
                        					</td>       
							<td>{$rowData.first_name} {$rowData.last_name}</td>
							<td>{$rowData.email}</td>
							<td>{$rowData.phone_home}</td>
		    	</tr>
	{/foreach}	    	
        </tbody>
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
 {/literal}
</script>