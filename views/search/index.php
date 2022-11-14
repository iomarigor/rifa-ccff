<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIIS UNAS</title>
    <link rel="icon" href="https://fiis.unas.edu.pe/sites/all/themes/business_responsive_theme/favicon.ico" />
</head>

<body>
    <h1>Lista de participantes</h1>
    <p>ID de ticket / Codigo de estudiante / Nombres</p>
    <?php
    for ($i = 0; $i < count($this->listaPaticipantes); $i++) {
        echo ($i + 1) . ". RCCFF-2022-" . $this->listaPaticipantes[$i]->IDRifa . " / " . $this->listaPaticipantes[$i]->Codigo . " / " . $this->listaPaticipantes[$i]->Nombres . "<br></br>";
    }
    ?>
</body>

</html>