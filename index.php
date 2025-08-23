<?php
$serverName = "britinho.database.windows.net";
$connectionOptions = array(
    "Database" => "britinho",
    "Uid" => "britinho",
    "PWD" => "Projeto@2025"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die("<h1>Erro de Conexão</h1><p>Não foi possível conectar ao banco de dados. Verifique as credenciais e a configuração do firewall.</p><pre>" . print_r(sqlsrv_errors(), true) . "</pre>");
}

$sql = "SELECT Id_Cliente, Nome, Endereco, Cidade, Telefone FROM Clientes ORDER BY Id_Cliente;";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die("<h1>Erro na Consulta</h1><p>Não foi possível executar a consulta SQL.</p><pre>" . print_r(sqlsrv_errors(), true) . "</pre>");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Clientes</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        :root {
            --primary-color: #007BFF;
            --light-grey: #f8f9fa;
            --dark-grey: #343a40;
            --border-color: #dee2e6;
            --shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-grey);
            color: var(--dark-grey);
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 30px;
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--shadow);
        }

        h1 {
            color: var(--dark-grey);
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }
        
        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        thead th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            font-size: 16px;
        }
        
        thead th:first-child { border-top-left-radius: 8px; }
        thead th:last-child { border-top-right-radius: 8px; }

        tbody tr {
            transition: background-color 0.3s ease;
        }
        
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e9ecef;
            cursor: pointer;
        }
        
        .fa-solid {
            margin-right: 8px;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1><i class="fa-solid fa-users"></i> Dashboard de Clientes</h1>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th><i class="fa-solid fa-id-card"></i> ID</th>
                        <th><i class="fa-solid fa-user"></i> Nome</th>
                        <th><i class="fa-solid fa-map-marker-alt"></i> Endereço</th>
                        <th><i class="fa-solid fa-city"></i> Cidade</th>
                        <th><i class="fa-solid fa-phone"></i> Telefone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['Id_Cliente']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Nome']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Endereco']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Cidade']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Telefone']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
    ?>

</body>
</html>