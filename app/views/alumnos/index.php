<!DOCTYPE html>
<html>
<head>
    <title>Alumnos</title>
</head>
<body>

<h1>Lista de Alumnos</h1>

<form method="POST" action="?action=create">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="email" name="correo" placeholder="Correo" required>
    <button type="submit">Agregar</button>
</form>

<hr>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Acciones</th>
    </tr>

    <?php foreach ($alumnos as $alumno): ?>
    <tr>
        <td><?= $alumno['id'] ?></td>
        <td><?= $alumno['nombre'] ?></td>
        <td><?= $alumno['correo'] ?></td>
        <td>
            <a href="?action=delete&id=<?= $alumno['id'] ?>">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>