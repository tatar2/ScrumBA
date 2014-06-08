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
  <?php
      $usersprojects=$this->get('usersprojects');
      if (empty($usersprojects)) {
      	echo 'Brak uczestników.';
      } else {
  ?>
  <table>
  <?php 
       	foreach ($usersprojects as $userproject) {
  ?>
  	<tr>
  		<td><?php print ($userproject['username']);?>
    </tr>
  <?php
      	}
  ?>
  </table>
  <?php 
  	}
  ?>
  <div>
  	<a href="?v=userproject&a=addusers&p=<?php print $project['projectid']?>">Dodaj uczestników</a>
  <?php 
  	if (!empty($usersprojects)) {
  ?>
    <a href="?v=userproject&a=removeusers&p=<?php print $project['projectid']?>">Usuń uczestników</a>
  <?php 
      } 
  ?>
  </div>
  <?php
    }
  ?>
</div>

