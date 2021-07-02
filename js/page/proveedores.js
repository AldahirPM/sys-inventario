
$(document).ready( function (){
    cargarListaProveedores();

    $('body').on('click','.checkPro', function (){
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
            url :  base_url+'Proveedores/updateProveedorEstado',
            type: 'POST',
            data:{
                id:id,
                estado:estado
            },

            dataType:'JSON',
            success: function (data) {

                if(data.result == 1){
                    cargarListaProveedores();  
                }
                
                Swal.fire({
                
                    position: data.position,
                    icon: data.icon,
                    title: data.message,
                    text: data.nombre,
                    toast:data.toast,
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

function insertProveedor(){
    var formData = new FormData($("#frmProveedor")[0]);

    $.ajax({

        url: base_url+'Proveedores/insertarProveedor',
        type:'POST',
        data:formData,
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        dataType: 'JSON',
        success: function(data){
            if(data.result == 1){
                cargarListaProveedores();
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
                timer: 1500
            });
        }



    });

    return false;
}


function updateProveedor(){
    var formData = new FormData($("#frmProveedor")[0]);

    $.ajax({

        url: base_url+'Proveedores/updateProveedor',
        type:'POST',
        data:formData,
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        dataType: 'JSON',
        success: function(data){
            if(data.result == 1){
                cargarListaProveedores();
            }
            Swal.fire({
                
                position: data.position,
                icon: data.icon,
                title: data.message,
                text: data.nombre,
                toast:data.toast,
                showConfirmButton: false,
                width: 400,
                timer: 1500
            });
        }



    });

    return false;
}

function cargarListaProveedores(){

    
    $("#tbl_proveedores").dataTable().fnDestroy();

    $.ajax({
        url: base_url+"Proveedores/cargarProveedores",

        success : function(data) {

            var o = JSON.parse(data);//A la variable le asigno el json decodificado

        $('#tbl_proveedores').dataTable( {
                data : o,
                columns: [
                    {"data" : "ruc"},
                    {"data" : "rSocial"},
                    {"data" : "encargado"},
                    {"data" : "direccion"},
                    {"data" : "tipoPersona"},
                    {"data" : "check"},
                    {"data" : "buttons"}            
                ],
                // columnDefs: [
                //     { width: '15px', targets: 0 },
                //     { width: '30px', targets: 1 },
                //     { width: '12px', targets: 2 },
                //     { width: '18px', targets: 3 },
                //     { width: '8px', targets: 4 },
                //     { width: '1px', targets: 5 },
                //     { width: '1px', targets: 6 },
                

                 
                // ],
                // fixedColumns: true
            });

            

        }       
    });
}