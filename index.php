<?php 
require_once('conn/config.php'); 
require_once('inc/header.php'); 
?>

  <h2>Delete Data By Checkbox</h2>
         <a href="javascript:void(0)" onclick="delete_all();" class="btn btn-danger">Delete</a>     <form id="chk_box_form">
  <table class="table table-dark mt-2">
    <thead>
      <tr>
        <th><input type="checkbox" id="delete_chkbox"  onclick="select_all();"></th>
        <th>#ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	$getData = "SELECT * FROM users";
    	$res = mysqli_query($conn,$getData);
    	if(mysqli_num_rows($res) > 0){
    		$sno=1;
    		while($rs = mysqli_fetch_assoc($res)){?>
    			<tr id="table_data<?php echo $rs['id'];?>">
			      	<td><input type="Checkbox" name="delete_data[]" id="<?php echo $rs['id']; ?>" value="<?php echo $rs['id']; ?>"></td>
			      	<td><?php echo $sno++; ?></td>
			        <td><?php echo $rs['first_name']; ?></td>
			        <td><?php echo $rs['last_name']; ?></td>
			        <td><?php echo $rs['email']; ?></td>
      			</tr>
      		<?php } }  ?>
      </tbody>
  </table>
</form>


<?php require_once('inc/footer.php');?> 
<script type="text/javascript">
	//selecting all data 
	function select_all(){
		if($("#delete_chkbox").prop("checked")){
			$('input[type=checkbox]').each(function(){
			$('#'+this.id).prop('checked',true);
		});

		}else{
			$('input[type=checkbox]').each(function(){
			$('#'+this.id).prop('checked',false);
		});

		}
		
	}

	//function for delteing data
	function delete_all(){
		if(confirm("Do you want to delete this data ?")){

		
		$.ajax({
			url:'delete_data.php',
			type:'POST',
			data:$("#chk_box_form").serialize(),
			success:function(res){
				$('input[type=checkbox]').each(function(){
					if($('#'+this.id).prop("checked")){
						$("#table_data"+this.id).remove();
					}
			
			});


			}
		});

	}
	}
</script>