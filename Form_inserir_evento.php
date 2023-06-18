<?php
print <<<_HTML_
    <H3> Preencha os dados do evento </H3>
    <FORM method="post" action="Inserir_Evento.php">
    ID: <input type="number" name="ID">
    <BR/>
    Nome: <input type="text" name="Nome">
    <BR/>
    Descricao: <input type="text" name="Descricao">
    <BR/>
    Valor: <input type="number" name="Valor">
    <BR/>
    Local: <input type="text" name="Local">
    <BR/>
    Quantidade de ingressos: <input type="number" name="Qtd_ingressos">
    <BR/>
    Email: <input type="text" name="Email_promotor">
    <BR/>
    <INPUT type="submit" value="Inserir Empregado">
    </FORM>
    _HTML_;
?>