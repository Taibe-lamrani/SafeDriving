/******************************************************************************/
//AJOUT CLIENT

function verifClient(){
    
    if(!document.clientForm.studentName.value){
       document.getElementById("messageErreur").style.display = "inline";
       document.clientForm.studentName.className = "erreur";
       document.clientForm.studentName.focus();
       return false
    }
    
    if(!document.clientForm.studentFirstName.value){
       document.getElementById("messageErreur").style.display = "inline";
       document.clientForm.studentFirstName.className = "erreur";
       document.clientForm.studentFirstName.focus();
       return false
    }
    
    if(!document.clientForm.studentEmail.value){
       document.getElementById("messageErreur").style.display = "inline";
       document.clientForm.studentEmail.className = "erreur";
       document.clientForm.studentEmail.focus();
       return false
    }
    
    if(!document.clientForm.studentPhone.value){
       document.getElementById("messageErreur").style.display = "inline";
       document.clientForm.studentPhone.className = "erreur";
       document.clientForm.studentPhone.focus();
       return false
    }
    if(document.verifFormDecennales.accidentTavail[0].checked){
        if(!document.clientForm.dateCode.value){
           document.getElementById("messageErreur").style.display = "inline";
           document.clientForm.dateCode.className = "erreur";
           document.clientForm.dateCode.focus();
           return false
        }
    }
    return true
}