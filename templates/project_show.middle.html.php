<div class="inside project_show">
  <h2>Lista projektów</h2>
  <?php
    $projects=$this->get('projects');
    if (empty($projects)) {
      echo 'Nie masz zdefiniowanych projektów.';
    } else {
  ?>
  
  <?php
		foreach ($projects as $project){
  ?>
    <div class="projectdisplay">
    <div><a href="?v=userproject&a=show&p=<?php print($project['projectid'])?>"><?php print($project['projectname']); ?></a></div>
    <div><?php print($project['projectdesc']); ?></div>
  </div>
  <?php
    	}
    }
  ?>
  <div class="addbutton">
    <form name="addproject" action="?v=project&a=add" method="post">
      <input type="submit" value="Dodaj projekt">
    </form>
  </div>
</div>
