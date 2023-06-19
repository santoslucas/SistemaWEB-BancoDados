<?php
print <<<_HTML_
    <H3> Insira um novo cupom </H3>
    <FORM method="post" action="Criar_cupom.php">
    ID: <input type="number" name="ID">
    <BR/>
    ID do evento: <input type="number" name="ID_evento">
    <BR/>
    Porcentagem de desconto: <input type="number" name="Desconto">
    <BR/>
    <INPUT type="submit" value="Criar cupom">
    </FORM>
    _HTML_;
?>