<h2 class="mb-4">👨‍🎓 Alumnos</h2>

<form method="POST" action="?action=create" class="row g-3 mb-4">
    <div class="col-md-4">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
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
                        <a href="?action=delete&id=<?= $alumno['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
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