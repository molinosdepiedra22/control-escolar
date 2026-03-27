<div class="container mt-4">
    <h2>Editar Maestro</h2>
    <hr>
    
    <form action="?action=update_maestro" method="POST" class="row g-3">
        <input type="hidden" name="id" value="<?= $maestro['id'] ?>">

        <div class="col-md-6">
            <label class="form-label">Nombre Completo</label>
            <input type="text" name="nombre" class="form-control" 
                   value="<?= htmlspecialchars($maestro['nombre']) ?>" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Correo Electrónico</label>
            <input type="email" name="correo" class="form-control" 
                   value="<?= htmlspecialchars($maestro['correo']) ?>" required>
        </div>

        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-success">Actualizar Datos</button>
            <a href="?action=maestros" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>