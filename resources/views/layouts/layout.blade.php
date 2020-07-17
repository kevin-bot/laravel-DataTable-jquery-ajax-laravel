<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Clase 2') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Estas líneas son de los data table -->
    <link rel="stylesheet" type="text/css" href="    https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

</head>
<body>
    <div id="app">

        <!--Aqui barra de navegación -->

        <main class="py-4">
           
        <!-- Aqui todo nuestro codigo, includes y otros -->
        @yield('content')
        @include('eliminar')
        @include('grabar')
        @include('actualizar')
        </main>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer></script>

</body>
</html>

<script>
    $(function(){
        $('#example5').DataTable(
        {
            "serverSide":true,
            "ajax":"{{ url('api/estudiantes')}}",
            "columns":[
                {data:'id'},
                {data:'codigo'},
                {data:'nombres'},
                {data:'apellidos'},
                {data:'btn'},
            ],
            "pageLength":8,
            language:{
                "search": "Buscar:",
            },
        });
    });
</script>

<script>
    $(function(){
        //show form Eliminar el usuario
        var table = $('#example5').DataTable();

        table.on('click', '.delete',function(){
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }
            var data = table.row($tr).data();
            $('#idEliminar').val(data.id);
            //$('#nombre').val(data.nombres);
        $('#deleteEstudiante').modal('show');
        });
    });    
</script>
<script>
    $(function(){
        //Eliminar el usuario
       $('#elimina').click( function(){
            var idEliminar = $('#idEliminar').val();
            var token = $('#token').val();
            var ruta  = "estudiantes/eliminar/"+idEliminar;
            console.log(idEliminar);

            $.ajax({
                url: ruta,
                headers: {'X-CSRF-TOKEN': token},
                type: 'DELETE',
                dataType: 'json',
                data: {
                    id: idEliminar
                }
            });
            $('#example5').DataTable().ajax.reload();
       });
    });
        
</script>

<script>
    $(function(){
    //show form Eliminar el usuario
    var table = $('#example5').DataTable();

    table.on('click', '.edit',function(){
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();  
        
        $('#idEliminara').val(data.id);   
        $('#_codigoa').val(data.codigo);        
        $('#_nombresa').val(data.nombres);
        $('#_apellidosa').val(data.apellidos);
        //$('#nombre').val(data.nombres);
       $('#actualizarestudiante').modal('show');
    });
    });
</script>

<script>
    $(function(){
        //actualizar
       $('#actualizabtn').click( function(){
            var idEliminar = $('#idEliminara').val();
            var cod = $('#_codigoa').val();
            var nom = $('#_nombresa').val();
            var ape = $('#_apellidosa').val();

            var token = $('#token').val();
            var ruta  = "estudiantes/"+idEliminar;
            

            $.ajax({
                url: ruta,
                headers: {'X-CSRF-TOKEN': token},
                type: 'patch',
                dataType: 'json',
                data: {
                    codigo : cod,
                    nombres : nom,
                    apellidos : ape
                }
            });
            $('#example5').DataTable().ajax.reload();
       });
    });
</script>

 <script>
     // Crear estudiante
     $('#registro').click( function(){
             var cod = $('#_codigo').val();
             var nom = $('#_nombres').val();
             var ape = $('#_apellidos').val();

             var route = "/estudiantes";
             var token = $('#token').val();

             $.ajax({
                url: route,
                headers: {'X-CSRF-TOKEN': token},
                type:'POST',
                dataType: 'json',
                data: {
                    codigo : cod,
                    nombres : nom,
                    apellidos : ape
                },
             });
        $('#example5').DataTable().ajax.reload();    
     });
 </script>




