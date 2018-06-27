function validar(){
    var nombre,apellido,documento,genero,direccion,correo,telefono,contraseña,sede;
    nombre = document.getElementById("Nombre").value;
    apellido = document.getElementById("Apellido").value;
    documento = document.getElementById("Documento").value;
    genero = document.getElementById("Genero").value;
    direccion = document.getElementById("Direccion").value;
    correo = document.getElementById("Correo").value;
    telefono = document.getElementById("Telefono").value;
    contraseña = document.getElementById("Contraseña").value;
    sede = document.getElementById("Sede").value;
    
    if(nombre === "" || apellido === "" || documento = "" || genero = "" || direccion = "" || correo = "" || telefono = "" || contraseña = "" || sede = ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(nombre.length>45){
        alert("El nombre el muy largo");
        return false;
    }
    else if(apellido.length>45){
        alert("El apellido es muy largo");
        return false;
    }
    else if(documento.length>45){
        alert("Documento es muy largo");
        return false;
    }
    else if(genero.length>11){
        alert("Genero invalido");
        return false;
    }
    else if(direccion.length>45){
        alert("Direccion es muy larga");
        return false;
    }
    else if(correo.lenght>45){
        alert("Correo es muy largo");
        return false;
    }
    else if(telefono.length>45 || (isNaN(telefono))){
        alert("telefono es muy largo o contiene letras");
        return false;
    }
    else if(contraseña.lenght>45){
        alert("Contraseña es muy larga");
        return false;
    }
    else if(sede.lenght>11){
        alert("Sede no existe");
        return false;
    }
}