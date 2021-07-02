var tblUsuario;
$(document).ready( function (){
    cargarListaUsuarios();
    
    // $('#tbl_usuario').DataTable();
    $('body').on('click','.mostrarPass', function (){
        if($(this).is(':checked')){
            $('.password').removeAttr('type','password');
            $('.password').attr('type','text');

        }else{
            $('.password').removeAttr('type','text');
            $('.password').attr('type','password');
        }
    });

    $('body').on('click','.checkUsuario', function (){
        var id= $(this).val();
        var estado = '';

        if($(this).is(':checked')){
            
            estado= 'A';
        }else{
            estado= 'I';
        }

        $.ajax({

            beforeSend: function (){
            
            },
            url :  base_url+'Usuario/updateEstado',
            type: 'POST',
            data:{
                id:id,
                estado:estado
            },

            dataType:'JSON',
            success: function (data) {

                Swal.fire({
                
                    position: data.position,
                    icon: data.icon,
                    title: data.message,
                    text: data.nombre,
                    toast:data.toast,
                    // iconColor:data.color,
                    showConfirmButton: false,
                    width: 400,
                    timer: 1000
                });
                
            },
            complete: function (){
                
            }
        });
    });
});

function insertUsuario(){
    var formData = new FormData($("#frmUsuario")[0]);

    $.ajax({
        beforeSend: function (){
            
        },
        url :  base_url+'Usuario/insertUsuario',
        type: 'POST',
        data:  formData,
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        dataType:'JSON',
        success: function (data) {
            if(data.result == 1){
                cargarListaUsuarios();
                $('.close-modal-1').click();

            }
            
            Swal.fire({
                
                position: data.position,
                icon: data.icon,
                title: data.message,
                text: data.nombre,
                toast:data.toast,
                showConfirmButton: false,
                width: 400,
                timer: 2000
            });
            
        },
        complete: function (){
            
        }
            
    

    });

    return false;
}

function updateUsuario(){

    var formData = new FormData($("#frmUsuario")[0]);
    $.ajax({
        beforeSend: function (){
            
        },
        url :  base_url+'Usuario/updateUsuario',
        type: 'POST',
        data:  formData,
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        dataType:'JSON',
        success: function (data) {
            if(data.result == 1){
                cargarListaUsuarios();

                $('.close-modal-1').click();

            }

            Swal.fire({
                
                position: data.position,
                icon: data.icon,
                title: data.message,
                text: data.nombre,
                toast:data.toast,
                showConfirmButton: false,
                width: 400,
                timer: 2000
            });
            
            
        },
        complete: function (){
            
        }
            
    

    });



    return false;

}
function cargarListaUsuarios(){

    
    $("#tbl_usuario").dataTable().fnDestroy();

    $.ajax({
        url: base_url+"Usuario/cargarDatos",

        success : function(data) {

            var o = JSON.parse(data);//A la variable le asigno el json decodificado

        $('#tbl_usuario').dataTable( {
                data : o,
                
                columns: [
                    {"data" : "nombre"},
                    {"data" : "apellido"},
                    {"data" : "cel"},
                    {"data" : "correo"},
                    {"data" : "direccion"},
                    {"data" : "nom_usuario"},
                    {"data" : "rol_usu"},
                    {"data" : "estado"},
                    {"data" : "buttons"}            
                ],
                columnDefs: [
                    { width: 'auto',high: 'auto', targets: 0 },
                    { width: 'auto', targets: 1 },
                    { width: '10px', targets: 2 },
                    { width: '10px', targets: 3 },
                    { width: 'auto', targets: 4 },
                    { width: 'auto', targets: 5 },
                    { width: '5px', targets: 6 },
                    { width: '5px',className: "text-center", targets: 7 },
                    { width: '5px',className: "text-center", targets: 8 },
                ],
                fixedColumns: true
            });

            

        }       
    });
}
