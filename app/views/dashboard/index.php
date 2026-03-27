<h2 class="mb-4">📊 Dashboard</h2>

<div class="row">

    <!-- Alumnos -->
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">👨‍🎓 Alumnos</h5>
                <h2><?= $totalAlumnos ?></h2>
            </div>
        </div>
    </div>

    <!-- Maestros -->
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">👨‍🏫 Maestros</h5>
                <h2><?= $totalMaestros ?></h2>
            </div>
        </div>
    </div>

    <!-- Materias -->
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3 shadow">
            <div class="card-body">
                <h5 class="card-title">📚 Materias</h5>
                <h2><?= $totalMaterias ?></h2>
            </div>
        </div>
    </div>

</div>