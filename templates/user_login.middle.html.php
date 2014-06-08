<div class="inside user_login">
  Podaj swoją nazwę użytkownika i hasło:<br>
  <form method="post" action="?v=user&a=dologin">
    <table class="forms">
      <tr>
        <td class="tcleft">Użytkownik:</td>
        <td class="tcright"><input type="text" name="username" size="30"></td>
      </tr>
      <tr>
        <td class="tcleft">Hasło:</td>
        <td class="tcright"><input type="password" name="password" size="20"></td>
      </tr>
      <tr>
        <td class="tcleft"><input type="submit" value="Zaloguj"></td>
        <td class="tcright"><input type="button" name="Cancel" value="Anuluj" onclick="window.location ='?v=index&a=show'"></td>
      </tr>
    </table>
  </form>
</div>

