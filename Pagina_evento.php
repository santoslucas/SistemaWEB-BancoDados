<!DOCTYPE html>
<html>
<head>
    <title>Página do Evento</title>
    <style>
        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        .header {
            background-color: purple;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .evento-info {
            display: flex;
            justify-content: space-between;
            margin: 20px;
        }

        .evento-info-left {
            width: 60%;
        }

        .evento-info-right {
            width: 35%;
        }

        .data-horario {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .descricao {
            margin-top: 10px;
        }

        .ingressos {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .ingressos h2 {
            color: purple;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .ingresso-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .ingresso-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .ingresso-nome {
            font-weight: bold;
        }

        .ingresso-preco {
            font-weight: bold;
        }

        .adicionar-carrinho {
            background-color: purple;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .adicionar-carrinho:hover {
            background-color: #6e00b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><?php echo $nome; ?></h1>
    </div>

    <div class="evento-info">
        <div class="evento-info-left">
            <p class="data-horario">Data e Horário: <?php echo $data_horario; ?></p>
            <p class="descricao"><?php echo $descricao; ?></p>
        </div>
        <div class="evento-info-right">
            <div class="ingressos">
                <h2>Ingressos</h2>
                <?php foreach ($ingressos as $ingresso) { ?>
                    <div class="ingresso-item">
                        <div class="ingresso-nome"><?php echo $ingresso['nome']; ?></div>
                        <div class="ingresso-preco"><?php echo $ingresso['preco']; ?></div>
                    </div>
                <?php } ?>

                <button class="adicionar-carrinho">Adicionar ao Carrinho</button>
            </div>
        </div>
    </div>
</body>
</html>
