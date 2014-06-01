<div class="inside project_add">
  Nowy projekt:<br>
  <form method="post" action="?v=project&a=doadd">
    <table class="forms">
      <tr>
        <td class="tcleft">Nazwa:</td>
        <td class="tcright"><input type="text" name="projectname" size="20"></td>
      </tr>
      <tr>
        <td class="tcleft">Opis</td>
        <td class="tcright"><textarea name="projectdesc" rows="10" cols="60"></textarea></td>
      </tr>
      <tr>
        <td class="tcleft"><input type="submit" value="Dodaj" name="add"></td>
        <td class="tcright"><input type="button" name="Cancel" value="Anuluj" onclick="window.location ='?v=project&a=show'"></td>
      </tr>
    </table>
  </form>
</div>
    
