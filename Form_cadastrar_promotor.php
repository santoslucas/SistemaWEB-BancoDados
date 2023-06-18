<?php
print <<<_HTML_
    <H3> Preencha os dados do promotor </H3>
    <FORM method="post" action="Cadastrar_Promotor.php">
    Email: <input type="text" name="Email">
    <BR/>
    Nome: <input type="text" name="Nome">
    <BR/>
    Senha: <input type="text" name="Senha">
    <BR/>
    CNPJ: <input type="number" name="CNPJ">
    <BR/>
    <INPUT type="submit" value="Inserir Promotor">
    </FORM>
    _HTML_;
?>