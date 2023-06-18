<?php
print <<<_HTML_
    <H3> Preencha os dados do cliente </H3>
    <FORM method="post" action="Cadastrar_Cliente.php">
    Email: <input type="text" name="Email">
    <BR/>
    Nome: <input type="text" name="Nome">
    <BR/>
    Senha: <input type="text" name="Senha">
    <BR/>
    CPF: <input type="number" name="CPF">
    <BR/>
    Data de nascimento: <input type="date" name="Data_nascimento">
    <BR/>
    <INPUT type="submit" value="Inserir Cliente">
    </FORM>
    _HTML_;
?>