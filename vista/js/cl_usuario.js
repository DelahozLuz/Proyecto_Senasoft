class usuario{
    constructor(objData){
        this._objData = objData;
    }

    iniciarSesion(){
        let objDataUsuario = new FormData();
        objDataUsuario.append("email",this._objData.email);
        objDataUsuario.append("password",this._objData.password);
        objDataUsuario.append("iniciarSesion",this._objData.iniciarSesion);

        fetch("controlador/usuarioControlador.php",{
            method: 'POST',
            body: objDataUsuario
        })
        .then(response => response.json())
        .catch(error =>{
            console.log(error);
        })
        .then(response =>{
            console.log(response);
            if(response["codigo"]== "200"){
                window.location = "inicio";
            }else{
                alert(response["mensaje"]);
            }
        });
    }
    registrarUsuario(){
        let objData = new FormData();
        objData.append("nombre",this._objData.nombre);
        objData.append("apellido",this._objData.apellido);
        objData.append("telefono",this._objData.telefono);
        objData.append("email",this._objData.email);
        objData.append("password",this._objData.password);
        objData.append("registrarUsuario","ok");

        fetch("controlador/usuarioControlador.php",{
            method: 'POST',
            body:objData
        })
        .then(response => response.json()).catch(error =>{
            console.log(error)
        })
        .then(response =>{
            alert(response["mensaje"]);
        })
    }
}