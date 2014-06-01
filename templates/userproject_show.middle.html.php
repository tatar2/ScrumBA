<div class="inside project_show">
  <h2>Dane projektu</h2>
  <?php
    $project=$this->get('project');
    if (empty($project)) {
      echo 'Błędny projekt.';
    } else {
  ?>
  <div class="projectdisplay">
    <div><a href="?v=userproject&a=show&p=<?php print($project['projectid'])?>"><?php print($project['projectname']); ?></a></div>
    <div><?php print($project['projectdesc']); ?></div>
  </div>
  <h3>Lista uczestników:</h3>
  <table>
  <?php
      $usersprojects=$this->get('usersprojects');
      foreach($usersprojects as $userproject) {
  ?>
  	<tr>
    	<td><?php print ($userproject['username']);?>
    </tr>
  <?php
      }
    }
  ?>
  </table>
  <div class="addbutton">
    <form name="adduser" action="?v=userproject&a=adduser&p=<?php $project['projectid']?>" method="post">
      <input type="submit" value="Dodaj uczestnika">
    </form>
  </div>
</div>
