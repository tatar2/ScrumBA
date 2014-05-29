<div class="inside error_view">
  <div class="errorhead">
    Błąd!
  </div>
  <div class="errormessage">
    <?php print $this->get('errormessage'); ?>
  </div>
  <div class="errorbutton">
    <form name="error" action="<?php print $this->get('redirectto'); ?>" method="post">
      <input type="submit" value="OK">
    </form>
  </div>
</div>
