<div class="inside project_show">
  <h2>Lista projektów</h2>
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
  <div class="addbutton">
    <form name="addproject" action="?v=project&a=add" method="post">
      <input type="submit" value="Dodaj projekt">
    </form>
  </div>
</div>
