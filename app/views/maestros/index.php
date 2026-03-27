<h2 class="mb-4">👨‍🏫 Maestros</h2>

<!-- FORMULARIO -->
<form method="POST" action="?action=create_maestro" class="row g-3 mb-4">

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

<hr>

<!-- TABLA -->
<table class="table table-striped">

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
                        <a href="?action=delete_maestro&id=<?= $m['id'] ?>" 
                           class="btn btn-danger btn-sm">
                           Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">No hay maestros</td>
            </tr>
        <?php endif; ?>

    </tbody>

</table>