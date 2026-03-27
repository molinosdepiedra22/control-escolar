<?php 
if (session_status() === PHP_SESSION_NONE) session_start(); 
?>

<h2 class="mb-4">👨‍🎓 Alumnos</h2>

<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>⚠️ Error:</strong> <?php echo $_SESSION['error']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['success']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<form method="POST" action="?action=create_alumno" class="row g-3 mb-4">
    <div class="col-md-4">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre" 
               value="<?php echo $_SESSION['old_nombre'] ?? ''; unset($_SESSION['old_nombre']); ?>" required>
    </div>
    <div class="col-md-4">
        <input type="email" name="correo" class="form-control" placeholder="Correo" required>
    </div>
    <div class="col-md-2">
        <button class="btn btn-primary w-100">Agregar</button>
    </div>
</form>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($alumnos)): ?>
            <?php foreach ($alumnos as $alumno): ?>
                <tr>
                    <td><?= $alumno['id'] ?></td>
                    <td><?= $alumno['nombre'] ?></td>
                    <td><?= $alumno['correo'] ?></td>
                    <td>
                    <a href="?action=edit_alumno&id=<?= $alumno['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    
                    <a href="?action=delete_alumno&id=<?= $alumno['id'] ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Estás seguro de eliminar a este alumno?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">No hay alumnos</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>