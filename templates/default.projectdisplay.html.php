	<div class="projectdisplay">
	<div><?php print($project['projectname']); ?></div>
    	<div><?php print($project['projectdesc']); ?></div>
    	<div>
    		<form action="?v=userproject&a=show" method="post">
    		  <input type="hidden" name="projectid" value="<?php print($project['projectid'])?>">
    		  <input type="submit" value="Uczestnicy" name="show">
    		</form>
    		<form action="?v=project&a=edit" method="post">
    		  <input type="hidden" name="projectid" value="<?php print($project['projectid'])?>">
    		  <input type="submit" value="Edytuj" name="edit">
    		</form>
    		<form action="?v=userproject&a=show" method="post">
    		  <input type="hidden" name="projectid" value="<?php print($project['projectid'])?>">
    		  <input type="submit" value="Ustaw" name="set">
    		</form>
    	</div>
  	</div>