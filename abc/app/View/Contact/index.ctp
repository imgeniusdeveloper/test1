<?php $this->Html->script('contact', array('block' => 'scriptBottom')); ?>
<h2>Contact</h2>
<?php
//$cont = $this->Session->read($var);
$cont=$_SESSION['var'];

//debug($cont);
 if(isset($cont))
 {
		
?>
<div style="border:solid; border-color:#09C;">
	<table style="background-color:#B7ECFB;" align="center">
    <tr align="center">
         <th style="color:#FFF; background-color:#FD8551;">S.No</th>
          <th style="color:#FFF; background-color:#FD8551;"> Name</th>
          <th style="color:#FFF; background-color:#FD8551;">Email</th>
          <th style="color:#FFF; background-color:#FD8551;"> Telephone</th>
          <th style="color:#FFF; background-color:#FD8551;">Action</th>
		<?php
			$counter=1;
		 foreach($cont as $test): ?>
    <tr>
 <?php 
           $t_name=strtoupper($test['Contact']['name']);
          $pf_n=$test['Contact']['email'];
 ?>
        <td  align="center" style="color:#C60;"><?php echo $counter; $counter++; ?></td>
        <td  align="center" style="color:#C60;"><?php  echo $t_name; ?> </td>
         <td  align="center" style="color:#C60;"><?php echo $pf_n ; ?> </td>
       
              <td  align="center" style="color:#C60;"><?php echo $test['Contact']['telephone']; ?> </td>
              <!-- <td  align="center"><?php //echo $test['Contact']['modified']; ?> </td>-->
       <td  style="color:#C60;">
          <?php
				// echo $this->Form->button('Delete', array('action' => 'delete', $test['Contact']['id']), array('confirm' => 'Are you sure?'));
            ?>
            <input type="hidden" class="del_rec" value="<?php echo $test['Contact']['id']; ?>"/>
      <input type="button" name="del" rel="<?php echo $test['Contact']['id'] ?>" class="del" value="delete"/>
			
        </td>
        </tr>
       
    <?php endforeach; ?>
     </table>
     </div>  
	<?php 
 }
 ?>
 <div style="border:solid #09C; margin-top:1%; border-radius:2%; box-shadow:#8EDAF2 10px 10px 10px;">
<?php 
echo $this->Form->create('Contact');
echo $this->Form->input('name');
echo $this->Form->input('email');
echo $this->Form->input('telephone');
echo $this->Form->input('message');
?>
<div style="margin-left:45%; margin-top:-4%;"><?php echo $this->Form->end('Submit');?></div>
</div>
<script>
$(document).ready(function(){
    $('.del').click(function(){
    //alert("outer");   
   var id = $(this).attr('rel'); 
   myAction = ajax_url+"Contacts/delete/"+id; 
    //myAction = <?php //array('controller'=>"contacts",'action' => 'delete','+id');?>
   alert(myAction);            
      $.ajax({type: "get",url: myAction, success: function(html) 
      { 
      //$('#find_all_province').html(html);
     // $('#dvLoading').hide();
      }  
       })
   });
})
</script>
