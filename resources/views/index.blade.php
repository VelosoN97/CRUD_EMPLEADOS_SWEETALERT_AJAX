<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Empleados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/dt-2.2.2/datatables.min.css" rel="stylesheet" integrity="sha384-M6C9anzq7GcT0g1mv0hVorHndQDVZLVBkRVdRb2SsQT7evLamoeztr1ce+tvn+f2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    {{-- add new employee modal start --}}
<div class="modal fade" id="agregarEmpleadoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Agregar Empleado</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="#" method="POST" id="agregar_empleado_form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body p-4 bg-light">
        <div class="row">
          <div class="col-lg">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
          </div>
          <div class="col-lg">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" class="form-control" placeholder="Apellido" required>
          </div>
        </div>
        <div class="my-2">
          <label for="email">E-mail</label>
          <input type="email" name="email" class="form-control" placeholder="E-mail" required>
        </div>
        <div class="my-2">
          <label for="telefono">Telefono</label>
          <input type="tel" name="telefono" class="form-control" placeholder="Telefono" required>
        </div>
        <div class="my-2">
          <label for="post">Post</label>
          <input type="text" name="post" class="form-control" placeholder="Post" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" id="agregar_empleado_btn" class="btn btn-primary">Agregar Empleado</button>
      </div>
    </form>
  </div>
</div>
</div>
{{-- add new employee modal end --}}
{{-- edit employee modal start --}}
<div class="modal fade" id="editarEmpleadoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Editar Empleados</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="#" method="POST" id="editar_empleado_form" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" id="id">
      <!--<input type="hidden" name="emp_avatar" id="emp_avatar">-->
      <div class="modal-body p-4 bg-light">
        <div class="row">
          <div class="col-lg">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
          </div>
          <div class="col-lg">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido" required>
          </div>
        </div>
        <div class="my-2">
          <label for="email">E-mail</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
        </div>
        <div class="my-2">
          <label for="telefono">Telefono</label>
          <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="Telefono" required>
        </div>
        <div class="my-2">
          <label for="post">Post</label>
          <input type="text" name="post" id="post" class="form-control" placeholder="Post" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" id="editar_empleado_btn" class="btn btn-success">Editar Empleado</button>
      </div>
    </form>
  </div>
</div>
</div>
{{-- edit employee modal end --}}
<div class="container">
  <div class="row my-5">
    <div class="col-lg-12">
      <div class="card shadow">
        <div class="card-header bg-danger d-flex justify-content-between align-items-center">
          <h3 class="text-light">Lista de Empleados</h3>
          <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#agregarEmpleadoModal"><i
              class="bi-plus-circle me-2"></i>Agregar Empleado</button>
        </div>
        <div class="card-body" id="mostrar_all_empleados">
          <h1 class="text-center text-secondary my-5">Cargando...</h1>
        </div>
      </div>
    </div>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.2.2/datatables.min.js" integrity="sha384-k90VzuFAoyBG5No1d5yn30abqlaxr9+LfAPp6pjrd7U3T77blpvmsS8GqS70xcnH" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      fetchAllEmpleados();
      function fetchAllEmpleados(){
        $.ajax({
          url: '{{route('fetchAll')}}',
          method: 'get',
          success: function(res){
            $("#mostrar_all_empleados").html(res);
            $("table").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }

      $(document).on('click', '.eliminarIcon', function(e){
        e.preventDefault();
        let id = $(this).attr('id');
        Swal.fire({
          title: "Estas seguro/a de eliminar el registro?",
          text: "No podrás revertir esto.!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Sí, eliminar!"
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{route('eliminar')}}',
              method: 'post',
              data: {
                id: id,
                _token: '{{csrf_token()}}'
              },
              success: function(res){
                Swal.fire(
                  'Eliminado!',
                  'Empleado/a eliminado correctamente!.',
                  'success'
                )
                fetchAllEmpleados();
              }
            });
          }
        });
      });

      $("#editar_empleado_form").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#editar_empleado_btn").text('Actualizando...');
        $.ajax({
          url: '{{route('actualizar')}}',
          method: 'post',
          data: fd,
          cache: false,
          processData: false,
          contentType: false,
          success: function(res){
            if(res.status == 200){
              Swal.fire(
                'Actualizado/a!',
                'Empleado/a actualizado correctamente',
                'success'
              )
              fetchAllEmpleados();
            }
            $("#editar_empleado_btn").text('Actualizar empleado');
            $("#editar_empleado_form")[0].reset();
            $("#editarEmpleadoModal").modal('hide');
          }
        });
      });

      $(document).on('click','.editarIcon', function(e){
            e.preventDefault();
            let id = $(this).attr('id');
            $.ajax({
              url: '{{route('editar')}}',
              method: 'get',
              data: {
                id: id,
                _token: '{{csrf_token()}}'
              },
              success: function(res){
                $("#nombre").val(res.nombre);
                $("#apellido").val(res.apellido);
                $("#email").val(res.email);
                $("#telefono").val(res.telefono);
                $("#post").val(res.post);
                $("#id").val(res.id);
              }
            });
          });

      $("#agregar_empleado_form").submit(function(e){
        e.preventDefault();
        const fd = new FormData(this);
        $("#agregar_empleado_btn").text('Agregando...');
        $.ajax({
          url: '{{ route('store')}}',
          method: 'post',
          data: fd,
          cache: false,
          processData: false,
          contentType: false,
          success: function(res){
            if(res.status == 200){
              Swal.fire(
                'Agregado/a',
                'Empleado/a Agregado/a Correctamente',
                'success'
              )
              fetchAllEmpleados();
            }
            $("#agregar_empleado_btn").text('Agregar Empleado');
            $("#agregar_empleado_form")[0].reset();
            $("#agregarEmpleadoModal").modal('hide');
          }
        });
          
      });
    </script>
</body>
</html>