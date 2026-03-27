<?php
// Asegurar sesión
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
                <a href="/control-escolar/public/?action=index" class="nav-link text-white">
                    🏠 Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="/control-escolar/public/?action=alumnos" class="nav-link text-white">
                    👨‍🎓 Alumnos
                </a>
            </li>

            <li class="nav-item">
                <a href="/control-escolar/public/?action=maestros" class="nav-link text-white">
                    👨‍🏫 Maestros
                </a>
            </li>

            <li class="nav-item">
                <a href="/control-escolar/public/?action=materias" class="nav-link text-white">
                    📚 Materias
                </a>
            </li>

            <li class="nav-item mt-3">
                <a href="/control-escolar/public/?action=logout" class="nav-link text-danger">
                    🚪 Cerrar sesión
                </a>
            </li>

        </ul>
    </div>

    <!-- Contenido -->
    <div class="flex-grow-1">

        <!-- Navbar -->
        <nav class="navbar navbar-light bg-light px-3">
            <span>
                👤 <?= $_SESSION['usuario']['correo'] ?? 'Invitado' ?>
            </span>
        </nav>

        <!-- Contenido dinámico -->
        <div class="container mt-4">

            <?php
            if (isset($view) && file_exists($view)) {
                include $view;
            } else {
                echo "<div class='alert alert-danger'>⚠️ Vista no encontrada</div>";
            }
            ?>

        </div>

    </div>
</div>

</body>
</html>