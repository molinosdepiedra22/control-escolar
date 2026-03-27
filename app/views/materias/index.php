<h2 class="mb-4">📚 Materias</h2>

<form method="POST" action="?action=create_materia" class="row g-2 mb-4">
    <div class="col-auto">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre de la materia" required>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Agregar</button>
    </div>
</form>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th style="width: 120px;">Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php if (!empty($materias)): ?>
            <?php foreach ($materias as $materia): ?>
                <tr>
                    <td><?= $materia['id'] ?></td>
                    <td><?= $materia['nombre'] ?></td>
                    <td>
                        <a href="?action=delete_materia&id=<?= $materia['id'] ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('¿Eliminar esta materia?')">
                           Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">No hay materias registradas</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>