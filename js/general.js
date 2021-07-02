var base_url = "http://localhost/josmar/";

$(document).ready(function (){


    
    $("body").on("click", ".btn-frm-modal", function () {
        
        var id = $(this).attr('data-id');
        var form = $(this).attr('data-form');
        var tipo = $(this).attr('data-tipo');
   
        cargarForm(form, tipo, id);
    });

    $("body").on("click", ".btn-frm-modal-xl", function () {
        
        var id = $(this).attr('data-id');
        var form = $(this).attr('data-form');
        var tipo = $(this).attr('data-tipo');
   
        cargarForm_xl(form, tipo, id);
    });

    $("body").on("click",".cerrarSesion", function (){
        cerrarLogin();
    });
    $("body").on("change", "#imgSubir", function () {
    //Cuando el input cambie (se cargue un nuevo archivo) se va a ejecutar de nuevo el cambio de imagen y se verá reflejado.
        cargarFoto(this);
       
    });

});
// Modal
function cargarForm(form, tipo, id) {
  

    $("#content-modal-1").html("");

    $("#content-modal-1").load(base_url + "LoadForm/load_form/" + form + "/" + tipo + "/" + id);


}
function cargarForm_xl(form, tipo, id) {
  

    $("#content-modal-xl").html("");

    $("#content-modal-xl").load(base_url + "LoadForm/load_form/" + form + "/" + tipo + "/" + id);


}
//cargar Img Usuario
function cargarFoto(input){
   
    if (input.files && input.files[0]) { //Revisamos que el input tenga contenido
        var reader = new FileReader(); //Leemos el contenido
        
        reader.onload = function(e) { //Al cargar el contenido lo pasamos como atributo de la imagen de arriba
            $('.img').attr('style', 'background-image: url('+e.target.result+')');

        }
        
        reader.readAsDataURL(input.files[0]);
      }
}


function login(){

    var formData = new FormData($("#frmLogin")[0]);

    $.ajax({
        url :  base_url+'Login/logueo',
        type: 'POST',
        data:  formData,
        enctype: 'multipart/form-data',
        contentType: false,
        processData: false,
        dataType:'JSON',
        success: function (data) {
            if(data.result == 1){

                Swal.fire({
                    // position: 'top-end',
                    icon: 'success',
                    title: data.message,
                    text :data.nombre,
                    showConfirmButton: false,
                    timer: 2000
                });

                setTimeout('redirigir();',2000);
            }else{
                ohSnap(data.message, {color: data.color}); 
            }

            
            
        }
            
    

    });

    return false;
}
function cerrarLogin(){



    $.ajax({
        url :  base_url+'Login/cerrarLogin',
        type: 'POST',
        success: function (data) {         
            
            ohSnap('Has cerrado sesión', {color: 'green'}); 
        }
            
    

    });

}
function redirigir(){
    window.location.href = 'http://localhost/josmar/Dashboard';
}