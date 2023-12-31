<?php

include_once './config/config.php';
include_once './classes/produ.php';
include_once './classes/Pet.php';
include_once './classes/Agenda.php';
session_start();


$produ = new Produ($conn);

$pet = new Pet($conn);

$data = $produ->read();

$agenda = new Agenda($conn);

$ganso = $agenda->readEdit('$');

$pato = $pet->readEdits($_SESSION['id']);

if (!isset($_SESSION['username'])) {
    header("Location: realindex.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fk_iddog = $_SESSION['id'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $agenda->update($id, $data, $hora);

    echo "Editado com sucesso!!!😎👍";
    header('refresh:2,realindex.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php echo " " . $_SESSION['id'] . ""; ?>
    <form method="post">
        <h1>Altere seu agendamento de Banho e Tosa!</h1>
        <input type="date" name="data" id="data" placeholder="Insira a data ex:2023-11-02" required>
        <input type="time" name="hora" id="hora" placeholder="Insira a hora ex:10:35:00" required>
        <input class="btn2" name="form2" type="submit" value="Agendar" class="salvar">

    </form>
</body>

</html>