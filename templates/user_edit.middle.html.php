<div class="inside user_register">
  Edycja konta uzytkownika:<br>
  <form method="post" action="?v=user&a=doemail">
    <table class="forms">
      <tr>
        <td class="tcleft">Nazwa:</td>
        <td class="tcright"><?php print $this->user['username']?></td>
      </tr>
      <tr>
        <td class="tcleft">E-mail:</td>
        <td class="tcright"><input type="text" name="useremail" value="<?php print $this->user['useremail']?>"size="30"></td>
      </tr>
      <tr>
        <td class="tcleft"><input type="submit" value="Zmień email" name="updemail"></td>
        <td class="tcright"></td>
      </tr>
    </table>
  </form>
  <form method="post" action="?v=user&a=dopassword">
    <table class="forms">
      <tr>
        <td class="tcleft">Stare hasło:</td>
        <td class="tcright"><input type="password" name="password" size="20"></td>
      </tr>
      <tr>
        <td class="tcleft">Nowe hasło:</td>
        <td class="tcright"><input type="password" name="npassword" size="20"></td>
      </tr>
      <tr>
        <td class="tcleft">Powtórz nowe hasło:</td>
        <td class="tcright"><input type="password" name="rpassword" size="20"></td>
      </tr>
      <tr>
        <td class="tcleft"><input type="submit" value="Zmień hasło" name="updpassword"></td>
        <td class="tcright"></td>
      </tr>
    </table>
  </form>
</div>
    
