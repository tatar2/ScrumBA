<div class="inside info_view">
  <div class="infohead">
    Info
  </div>
  <div class="infomessage">
    <?php print $this->get('infomessage'); ?>
  </div>
  <div class="infobutton">
    <form name="info" action="<?php print $this->get('redirectto'); ?>" method="post">
      <input type="submit" value="OK">
    </form>
  </div>
</div>
