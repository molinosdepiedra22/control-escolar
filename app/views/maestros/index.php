<?php 
if (session_status() === PHP_SESSION_NONE) session_start(); 
?>

<h2 class="mb-4">👨‍🏫 Maestros</h2>

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

<form method="POST" action="?action=create_maestro" class="row g-3 mb-4">
    <div class="col-md-4">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre" 
               value="<?php echo $_SESSION['old_nombre_maestro'] ?? ''; unset($_SESSION['old_nombre_maestro']); ?>" required>
    </div>

    <div class="col-md-4">
        <input type="email" name="correo" class="form-control" placeholder="Correo" required>
    </div>

    <div class="col-md-2">
        <button class="btn btn-primary w-100">Agregar</button>
    </div>
</form>

<hr>

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
        <?php if (!empty($maestros)): ?>
            <?php foreach ($maestros as $m): ?>
                <tr>
                    <td><?= $m['id'] ?></td>
                    <td><?= $m['nombre'] ?></td>
                    <td><?= $m['correo'] ?></td>
                    <td>
                        <a href="?action=edit_maestro&id=<?= $m['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        
                        <a href="?action=delete_maestro&id=<?= $m['id'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('¿Estás seguro de eliminar a este maestro?')">
                           Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">No hay maestros registrados</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>