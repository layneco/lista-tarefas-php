<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Minha Lista de Tarefas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <?php

        function adicionarTarefa($tarefa, $prioridade)
        {
            return [
                "tarefa" => $tarefa,
                "prioridade" => $prioridade
            ];
        }

        $tarefas = [
            adicionarTarefa("Estudar PHP", "Alta"),
            adicionarTarefa("Fazer atividade da ETEC", "Média"),
            adicionarTarefa("Organizar projetos do GitHub", "Alta")
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $tarefa = $_POST["tarefa"];
            $prioridade = $_POST["prioridade"];

            $tarefas[] = adicionarTarefa($tarefa, $prioridade);
        }

        ?>

        <h1>Minha Lista de Tarefas</h1>

        <p class="subtitulo">Organize suas atividades por prioridade</p>

        <form method="POST">

            <label for="tarefa">Tarefa:</label>
            <input type="text" id="tarefa" name="tarefa" placeholder="Digite uma tarefa" required>

            <label for="prioridade">Prioridade:</label>

            <select id="prioridade" name="prioridade" required>
                <option value="">Selecione</option>
                <option value="Baixa">Baixa</option>
                <option value="Média">Média</option>
                <option value="Alta">Alta</option>
            </select>

            <button type="submit">Adicionar tarefa</button>

        </form>

        <div class="lista">

            <h2>Tarefas cadastradas</h2>

            <?php foreach ($tarefas as $item) { ?>

                <div class="tarefa">

                    <strong>
                        <?php echo $item["tarefa"]; ?>
                    </strong>

                    <span class="prioridade <?php echo strtolower($item["prioridade"]); ?>">
                        Prioridade: <?php echo $item["prioridade"]; ?>
                    </span>

                </div>

            <?php } ?>

        </div>

    </div>

</body>

</html>