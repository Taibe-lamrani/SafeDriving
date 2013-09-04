//LISTE DEPENDANTE

function setVehicule(){
    $.ajax({
            type: "POST",
            url: "./liste/listevehicule.php",
            data: "idType=" + $("select[name=type_id]").attr("value"),
            success: function(data){
                    $("#selectVoiture").html(data);
            }
    });
}

function setCircuit(){
    $.ajax({
            type: "POST",
            url: "./liste/listeCircuit.php",
            data: "type=" + $("select[name=type_id]").attr("value"),
            success: function(data){
                    $("#selectCircuit").html(data);
            }
    });
}

function setPack(){
    $.ajax({
            type: "POST",
            url: "./liste/listePack.php",
            data: "typePack=" + $("select[name=type_id]").attr("value"),
            success: function(data){
                    $("#selectPack").html(data);
            }
    });
}

function setClient(){
    $.ajax({
            type: "POST",
            url: "./liste/listeClient.php",
            data: "listeClient=" + $("select[name=agence]").attr("value"),
            success: function(data){
                    $("#selectClient").html(data);
            }
    });
}


///////////////////////////////VERIF CLIENT////////////////////////////////////////////////////
function verifierStudent(){
    $.ajax({
            type: "POST",
            url: "./liste/listeVerifClient.php",
            data: "client=" + $("select[name=client]").attr("value"),
            success: function(data){
                    $("#erreurClient").html(data);
            }
    });
}