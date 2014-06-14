<div class="inside project_add">
  <h2>Dane projektu</h2>
  <?php
    $project=$this->get('project');
    if (empty($project)) {
      echo 'Błędny projekt.';
    } else {
    	require $this->getinclude('projectdisplay');
  ?>
  <div class="userlist">
  <h3>Usuń uczestników:</h3>
  <?php
      $users=$this->get('users');
      if (empty($users)) {
      	print 'Brak uczestników';
      } else { 
  ?>
      	<form name="removeusers" action="?v=userproject&a=doremoveusers" method="post">
      	<table>
  <?php 
       	foreach ($users as $user) {
  ?>
  			<tr>
    			<td><input type="checkbox" name="userid[]" value="<?php print ($user['puserid']);?>"><?php print ($user['username']);?>
    		</tr>
  <?php
      	}
  ?>
      	</table>
      	<input type="hidden" name="projectid" value="<?php print $project['projectid']?>">
      	<input type="submit" value="Usuń uczestników" class="addbutton">
      	</form>
     </div>
   <?php 
      }
  ?><div class="bottomlinks">
  		<a href="?v=userproject&a=show&p=<?php print $project['projectid']?>">Powrót</a>
  	</div>
  <?php
    }
  ?>
</div>
