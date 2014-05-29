<div class="inside user_register">
  Aby się zarejestrować, wypełnij formularz:<br>
  <form method="post" action="?v=user&a=doregister">
    <table class="forms">
      <tr>
        <td class="tcleft">Nazwa:</td>
        <td class="tcright"><input type="text" name="username" size="20"></td>
      </tr>
      <tr>
        <td class="tcleft">E-mail:</td>
        <td class="tcright"><input type="text" name="useremail" size="30"></td>
      </tr>
      <tr>
        <td class="tcleft">Hasło:</td>
        <td class="tcright"><input type="password" name="password" size="20"></td>
      </tr>
      <tr>
        <td class="tcleft">Powtórz hasło:</td>
        <td class="tcright"><input type="password" name="rpassword" size="20"></td>
      </tr>
      <tr>
        <td class="tcleft"><input type="submit" value="Zarejestruj" name="register"></td>
        <td class="tcright"><input type="button" name="Cancel" value="Anuluj" onclick="window.location ='?v=index&a=show'"></td>
      </tr>
    </table>
  </form>
</div>
    
