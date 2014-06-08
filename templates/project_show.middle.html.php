<div class="inside project_show">
  <?php
    $projects=$this->get('projects');
    if (empty($projects)) {
      echo 'Nie masz zdefiniowanych projektów.';
    } else {
		foreach ($projects as $project){
			require $this->getinclude('projectdisplay');
    	}
    }
  ?>
  <div class="bottomlinks">
    <a href="?v=project&a=add">Utwórz projekt</a>
  </div>
</div>
