
//Cargar dataTable
$(function() {
    $('#example').DataTable(
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
        "pageLength": 10,
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
    }
    );
});


//Editar estudiante
$(function(){
    var table=$('#example').DataTable();

    table.on('click','.edit',function(){
        $tr=$(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr=$tr.prev('.parent');
        }

        var data=table.row($tr).data();
        console.log(data);
        $('#codigo').val(data.codigo);
        $('#nombres').val(data.nombres);
        $('#apellidos').val(data.apellidos);


        $('#editForm').attr('action','/estudiantes/'+data.id);
        $('#editModal').modal('show');
    });
});




//eliminar estudiante
$(function(){
    var table=$('#example').DataTable();

    table.on('click','.delete',function(){
        $tr=$(this).closest('tr');
        if($($tr).hasClass('child')){
            $tr=$tr.prev('.parent');
        }

        var data=table.row($tr).data();
//console.log(data);
//$('#codigo').val(data.codigo);
//$('#nombres').val(data.nombres);
//$('#apellidos').val(data.apellidos);
$('#idEliminar').val(data.id);



//$('#deleteForm').attr('action','/estudiantes/eliminar/'+data.id);
$('#deleteEstudiante').modal('show');
});
});


// Eliminar segunda parte
$("#elimina").click(function(){
    var idEliminar=$("#idEliminar").val();
//var route="http://127.0.0.1:8000/estudiantes/eliminar/"+idEliminar;
var route="estudiantes/eliminar/"+idEliminar;
var token=$("#token").val();

console.log(idEliminar);
console.log(route);
console.log(token);



$.ajax({
    url:route,
    headers:{'X-CSRF-TOKEN': token},
    type:'DELETE',
    dataType:'json',
    data: {
        id:idEliminar
    }
});
//Actualiza el dataTable
$('#example').DataTable().ajax.reload();
});





//Agregar estudiante
$("#registro").click(function(){
    var cod=$("#_codigo").val();
    var nom=$("#_nombres").val();
    var ape=$("#_apellidos").val();
//var route="http://127.0.0.1:8000/estudiantes";
var route="estudiantes";
var token=$("#token").val();
console.log(cod);
console.log(nom);
console.log(ape);
console.log(token);

$.ajax({
    url:route,
    headers:{'X-CSRF-TOKEN': token},
    type:'POST',
    dataType:'json',
    data: {
        codigo: cod,
        nombres:nom,
        apellidos:ape,
    }
});
//Actualiza el dataTable
$('#example').DataTable().ajax.reload();
});
