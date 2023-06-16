$(document).ready(function(){

    $(".eliminar").click(function(){
        $codigo=$(this).attr("id");
        $.ajax({
            type:"POST", 
            url: "../lospost/elpost.php",
            data: {cod_mat_elim:$codigo},
            async: false,
            success : function(data){
                window.location.reload();
            }
        })
    });

    $("#botonCrear").click(function(){
        document.getElementById("actualizar").hidden=true;
        document.getElementById("crear").hidden=false;
                document.getElementById("codigo").value="";
                document.getElementById("nombre").value="";
                document.getElementById("comboBox").value="Seleccione un docente";
    });

    $("#formMaterias").submit(function(e){
        e.preventDefault();
        codigo = $("#codigo").val();
        nombre=$("#nombre").val();
        docente=$("#comboBox").val();
        $.ajax({
            url: "../lospost/elpost.php",
            type : "POST",
            data : {cod_mat_crear:codigo,nom_mat_crear:nombre,doc_mat_crear:docente},
            success : function(data){
                window.location.reload();
            }
        });
    });

    $(".editar").click(function(){
        codigo=$(this).attr("id");
        recibe="";
        $.ajax({
            url: "../lospost/elpost.php",
            type : "POST",
            data : {codigo_edicion:codigo},
            success : function(data){
                recibe=data;
                recibe=recibe.split("+");
                document.getElementById("codigo").value=recibe[0];
                document.getElementById("nombre").value=recibe[1];
                document.getElementById("comboBox").value=recibe[2];
                $("#exampleModal").modal('show');
                document.getElementById("actualizar").hidden=false;
                document.getElementById("crear").hidden=true;
            }
        });
        
    });

    $("#actualizar").click(function(e){
        codigo=$("#codigo").val();
        nombre=$("#nombre").val();
        docente=$("#comboBox").val();
        $.ajax({
            url: "../lospost/elpost.php",
            type : "POST",
            data : {cod_mat_act:codigo,nom_mat_act:nombre,doc_mat_act:docente},
            success : function(data){
                window.location.reload();
            }
        });
    });

});