$(document).ready(function(){

    $(".eliminar").click(function(){
        $codigo=$(this).attr("id");
        $.ajax({
            type:"POST", 
            url: "../lospost/elpost.php",
            data: {dni_eliminar:$codigo},
            async: false,
            success : function(data){
                window.location.reload();
            }
        })
    });

    $("#botonCrear").click(function(){
        document.getElementById("actualizar").hidden=true;
        document.getElementById("crear").hidden=false;
                document.getElementById("dni").value="";
                document.getElementById("nomOne").value="";
                document.getElementById("nomTwo").value="";
                document.getElementById("ApeOne").value="";
                document.getElementById("ApeTwo").value="";
                document.getElementById("em").value="";
                document.getElementById("cla").value="";
                document.getElementById("comboBox").value="Seleccione cargo";
                document.getElementById("dir").value="";
    });

    $("#formUsuarios").submit(function(e){
        e.preventDefault();
        dni = $("#dni").val();
        nom1=$("#nomOne").val();
        nom2=$("#nomTwo").val();
        ape1=$("#ApeOne").val();
        ape2=$("#ApeTwo").val();
        em=$("#em").val();
        cla=$("#cla").val();
        car=$("#comboBox").val();
        dir=$("#dir").val();
        $.ajax({
            url: "../lospost/elpost.php",
            type : "POST",
            data : {dni_creacion:dni,nom1_creacion:nom1,nom2_creacion:nom2,ape1_creacion:ape1
                    ,ape2_creacion:ape2,em_creacion:em,cla_creacion:cla,car_creacion:car,dir_creacion:dir},
            success : function(data){
                window.location.reload();
            }
        });
    });

    $(".editar").click(function(){
        dni=$(this).attr("id");
        recibe="";
        $.ajax({
            url: "../lospost/elpost.php",
            type : "POST",
            data : {dni_edicion:dni},
            success : function(data){
                recibe=data;
                recibe=recibe.split("+");
                document.getElementById("dni").value=recibe[0];
                document.getElementById("nomOne").value=recibe[1];
                document.getElementById("nomTwo").value=recibe[2];
                document.getElementById("ApeOne").value=recibe[3];
                document.getElementById("ApeTwo").value=recibe[4];
                document.getElementById("em").value=recibe[5];
                document.getElementById("cla").value=recibe[6];
                document.getElementById("comboBox").value=recibe[7];
                document.getElementById("dir").value=recibe[8];
                $("#exampleModal").modal('show');
                document.getElementById("actualizar").hidden=false;
                document.getElementById("crear").hidden=true;
            }
        });
        
    });

    $("#actualizar").click(function(e){
        dni = $("#dni").val();
        nom1=$("#nomOne").val();
        nom2=$("#nomTwo").val();
        ape1=$("#ApeOne").val();
        ape2=$("#ApeTwo").val();
        em=$("#em").val();
        cla=$("#cla").val();
        car=$("#comboBox").val();
        dir=$("#dir").val();
        $.ajax({
            url: "../lospost/elpost.php",
            type : "POST",
            data : {dni_act:dni,nom1_act:nom1,nom2_act:nom2,ape1_act:ape1
                    ,ape2_act:ape2,em_act:em,cla_act:cla,car_act:car,dir_act:dir},
            success : function(data){
                alert(data);
                window.location.reload();
            }
        });
    });

});