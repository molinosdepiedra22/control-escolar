<h2 class="mb-4">📝 Editar Alumno</h2>

<div class="card card-body">
    <form method="POST" action="?action=update_alumno" class="row g-3">
        <input type="hidden" name="id" value="<?= $alumno['id'] ?>">

        <div class="col-md-5">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" 
                   value="<?= htmlspecialchars($alumno['nombre']) ?>" required>
        </div>
        <div class="col-md-5">
            <label class="form-label">Correo</label>
            <input type="email" name="correo" class="form-control" 
                   value="<?= htmlspecialchars($alumno['correo']) ?>" required>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button class="btn btn-success w-100">Actualizar</button>
        </div>
    </form>
    <div class="mt-3">
        <a href="?action=alumnos" class="text-secondary">Cancelar y volver</a>
    </div>
</div>