<div class="inside userproject_show">
  <h2>Dane projektu</h2>
  <?php
    $project=$this->get('project');
    if (empty($project)) {
      echo 'Błędny projekt.';
    } else {
    	require $this->getinclude('projectdisplay');
  ?>
  <h3>Lista uczestników:</h3>
  <table>
  <?php
      $usersprojects=$this->get('usersprojects');
      foreach ($usersprojects as $userproject) {
  ?>
  	<tr>
    	<td><?php print ($userproject['username']);?>
    </tr>
  <?php
      }
  ?>
  </table>
  <div class="addbutton">
    <form name="addusers" action="?v=userproject&a=addusers" method="post">
      <input type="hidden" name="projectid" value="<?php print $project['projectid']?>">
      <input type="submit" value="Dodaj">
    </form>
  </div>
  <?php
    }
  ?>
</div>
