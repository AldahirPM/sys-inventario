var tblUsuario;
$(document).ready( function (){
    cargarListaRoles();

    $('body').on('click','.checkRol', function (){
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
            url :  base_url+'Roles/updateEstadoRol',
            type: 'POST',
            data:{
                id:id,
                estado:estado
            },

            dataType:'JSON',
            success: function (data) {

                if(data.result == 1){
                    cargarListaRoles();    
                }
                
                Swal.fire({
                
                    position: data.position,
                    icon: data.icon,
                    title: data.message,
                    text: data.nombre,
                    toast:data.toast,
                    // iconColor:data.color,
                    showConfirmButton: false,
                    width: 400,
                    timer: 1500
                });
            },
            complete: function (){
                
            }
        });
    });
});

function insertRol(){
    var formData = new FormData($("#frmRol")[0]);

    $.ajax({
        beforeSend: function (){
         
        },
        url :  base_url+'Roles/insertRol',
        type: 'POST',
        data:  formData,
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        dataType:'JSON',
        success: function (data) {
            if(data.result == 1){
                cargarListaRoles()
                $('.close-modal-1').click();
            }
           
            Swal.fire({
                
                position: data.position,
                icon: data.icon,
                title: data.message,
                text: data.nombre,
                toast:data.toast,
                // iconColor:data.color,
                showConfirmButton: false,
                width: 400,
                timer: 1500
            });
            
            
        },
        complete: function (data){
           
        }
            
    

    });

    return false;
}

function permisos(){
    var formData = new FormData($("#frmPermisos")[0]);

    $.ajax({
        beforeSend: function (){

        },
        url:base_url+'Roles/permisos',
        type: 'POST',
        data:  formData,
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        dataType:'JSON',
        success: function (data){
      
            Swal.fire({
                
                position: data.position,
                icon: data.icon,
                title: data.message,
                text: data.nombre,
                toast:data.toast,
                // iconColor:data.color,
                showConfirmButton: false,
                width: 400,
                timer: 1500
            });
        }

    });

    return false;

}

function updateRol(){

    var formData = new FormData($("#frmRol")[0]);

    $.ajax({
        beforeSend: function (){
         
        },
        url :  base_url+'Roles/updateRol',
        type: 'POST',
        data:  formData,
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        dataType:'JSON',
        success: function (data) {
            if(data.result == 1){
                cargarListaRoles();
                $('.close-modal-1').click();
            }
           
            Swal.fire({
                
                position: data.position,
                icon: data.icon,
                title: data.message,
                text: data.nombre,
                toast:data.toast,
                // iconColor:data.color,
                showConfirmButton: false,
                width: 400,
                timer: 1500
            });
            
            
        },
        complete: function (data){
           
        }
    });

    return false;

}

function cargarListaRoles(){

    
    $("#tbl_roles").dataTable().fnDestroy();

    $.ajax({
        url: base_url+"Roles/cargarRoles",

        success : function(data) {

            var o = JSON.parse(data);//A la variable le asigno el json decodificado

        $('#tbl_roles').dataTable( {
                data : o,
                // scrollX: true,
                columns: [
                    {"data" : "orden"},
                    {"data" : "nombre"},
                    {"data" : "descripcion"},
                    // {"data" : "fechaCrea"},
                    {"data" : "estado"},
                    {"data" : "buttons"}            
                ],
                columnDefs: [
                    { width: '1px', targets: 0 },
                    { width: 'auto', targets: 1 },
                    { width: 'auto', targets: 2 },
                    { width: '2px', targets: 3 },
                    { width: '2px', targets: 4 },
                 
                ],
                fixedColumns: true
            });

            

        }       
    });
}
