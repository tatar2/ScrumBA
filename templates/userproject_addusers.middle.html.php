<div class="inside project_add">
  <h2>Dane projektu</h2>
  <?php
    $project=$this->get('project');
    if (empty($project)) {
      echo 'Błędny projekt.';
    } else {
    	require $this->getinclude('projectdisplay');
  ?>
  <h3>Dodaj uczestników:</h3>
  <form name="addusers" action="?v=userproject&a=doaddusers" method="post">
  <table>
  <?php
      $users=$this->get('users');
      foreach ($users as $user) {
  ?>
  	<tr>
    	<td><input type="checkbox" name="userid[]" value="<?php print ($user['userid']);?>"><?php print ($user['username']);?>
    </tr>
  <?php
      }
  ?>
  </table>
      <input type="hidden" name="projectid" value="<?php print $project['projectid']?>">
      <input type="submit" value="Dodaj uczestników" class="addbutton">
    </form>
  <?php
    }
  ?>
</div>
