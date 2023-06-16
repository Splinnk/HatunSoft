$(document).ready(function(){

    let camera_button = document.querySelector("#permiso");
    let video = document.querySelector("#video");
    let click_button = document.querySelector("#tomaFoto");
    let canvas = document.querySelector("#canvas");
    
    camera_button.addEventListener('click', async function() {
           let stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
        video.srcObject = stream;

        document.getElementById("tomaFoto").hidden=false;
    });
    
    click_button.addEventListener('click', function() {
           canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
           let image_data_url = canvas.toDataURL('image/jpeg');
    
           // data url of the image
           //console.log(image_data_url);
           document.getElementById("guardar").hidden=false;
    });

    $("#guardar").click(function(){
        let imagenBD = document.querySelector("#canvas").toDataURL('image/jpeg').replace(/^data:image\/jpeg;base64,/, "");
            $.ajax({
                type: "POST",
                url: "../lospost/elpost.php",
                data: {fotoGuardada:imagenBD},
                async: false,
                success : function(data){

                    
                    
                }
            });
    });

});