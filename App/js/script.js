$( document ).ready(function() {


function validaForm(frm) {

    //Verifica se o campo nome foi preenchido e
    //contém no mínimo três caracteres.
    if(frm.nome.value == """ || frm.nome.value == null || frm.nome.value.lenght < 3 || frm.nome.value.lenght > 50") {
        //É mostrado um alerta, caso o campo esteja vazio.
        alert("Por favor, indique o seu nome.");
        
        frm.nome.focus();
        
        return false;
    }

}

});
