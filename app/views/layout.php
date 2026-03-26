<?php
?>

<!DOCTYPE html>
<html>
<head>
    <title>Control Escolar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="d-flex">

    <!-- Sidebar -->
    <div class="bg-dark text-white p-3" style="width: 250px; height: 100vh;">
        <h4>📚 Sistema</h4>
        <hr>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="?action=index" class="nav-link text-white">🏠 Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="?action=index" class="nav-link text-white">👨‍🎓 Alumnos</a>
            </li>
            <li class="nav-item">
                <a href="?action=login" class="nav-link text-white">🔐 Login</a>
            </li>
        </ul>
    </div>

    <!-- Contenido -->
    <div class="flex-grow-1">

        <!-- Navbar -->
        <nav class="navbar navbar-light bg-light px-3">
            <span>Bienvenido: <?= $_SESSION['usuario']['correo'] ?? 'Invitado' ?></span>

            <a href="?action=logout" class="btn btn-danger btn-sm">Cerrar sesión</a>
        </nav>

        <div class="container mt-4">
            <?php include $view; ?>
        </div>

    </div>
</div>

</body>
</html>