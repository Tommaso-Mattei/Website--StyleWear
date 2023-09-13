function controlloRegister(){
    const telefono = document.registerForm.inputTelefono.value; 
    if(isNaN(telefono)) {
        window.alert('Il telefono deve essere un NUMERO');
        return false;
    }
}