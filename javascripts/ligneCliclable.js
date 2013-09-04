$(document).ready(function(){
    $("#formGestionAjout").hide();
        $("#ajoutPart").click(function(){
           $("#formGestionAjout").toggle("slow");
        });
});
     
$(document).ready(function(){
    $(".formGestion").hide();
        $("#ajoutClient").click(function(){
           $(".formGestion").toggle("slow");
        });
});

$(document).ready(function(){
    $(".formGestion").hide();
        $("#ajoutFormation").click(function(){
           $(".formGestion").toggle("slow");
        });
});

$(document).ready(function(){
    $("#formGestionModif").hide();
        $("#modifierFormation").click(function(){
           $("#formGestionModif").toggle("slow");
        });
});

$(document).ready(function(){
    $("#formGestionSupprim").hide();
        $("#supprimPart").click(function(){
           $("#formGestionSupprim").toggle("slow");
        });
});

$(document).ready(function(){
   $("#lesson_placeNbr").hide();
    $("#showLesson_placeNbr").click(function(){
        $("#showLesson_placeNbr").hide();
        $("#lesson_placeNbr").show("fast");
    });
});

$(document).ready(function(){
   $("#type_id").hide();
    $("#showType_id").click(function(){
        $("#showType_id").hide();
        $("#type_id").show("fast");
    });
});

$(document).ready(function(){
   $("#circuit_id").hide();
    $("#showCircuit_id").click(function(){
        $("#showCircuit_id").hide();
        $("#circuit_id").show("fast");
    });
});

$(document).ready(function(){
   $("#instructor").hide();
    $("#showInstructor").click(function(){
        $("#showInstructor").hide();
        $("#instructor").show("fast");
    });
});