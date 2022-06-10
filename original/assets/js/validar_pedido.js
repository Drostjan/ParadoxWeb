const formulario = document.getElementById('formulario'); //Acceder al formulario
const inputs = document.querySelectorAll('#formulario input'); //Acceder al id formulario y a todos los inputs de dentro

const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ]{1,20}\s?[a-zA-ZÀ-ÿ]{1,20}$/, //Acepta letras y numeros
	telefono: /^\d{9,9}$/, //Acepta únicamente 9 numeros
    direccion: /^[a-zA-ZÀ-ÿ0-9,-\s]{1,100}$/ //Acepta solamente letras y comas
}

const campos = {nombre: false, telefono: false, direccion: false}

const validarformulario = (e) => {
    switch (e.target.name){
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
        break;
        case "telefono":
            validarCampo(expresiones.telefono, e.target, 'telefono');
        break;
        case "direccion":
            validarCampo(expresiones.direccion, e.target, 'direccion');
        break;
    }
}

const validarCampo = (expresion, input, campo) => {
    if(expresion.test(input.value)){//Si el input coincide con el archivo expresion
        document.getElementById(`div-${campo}`).classList.remove('clase-incorrecta');
        document.getElementById(`div-${campo}`).classList.add('clase-correcta');       
        document.querySelector(`#div-${campo} i`).classList.add('fa-check-circle'); 
        document.querySelector(`#div-${campo} i`).classList.remove('fa-times-circle'); 
        document.querySelector(`#div-${campo} .formulario-error`).classList.remove('formulario-error-activo');
        campos[campo] = true;
    } else {
        document.getElementById(`div-${campo}`).classList.add('clase-incorrecta');
        document.getElementById(`div-${campo}`).classList.remove('clase-correcta');
        document.querySelector(`#div-${campo} i`).classList.add('fa-times-circle'); 
        document.querySelector(`#div-${campo} i`).classList.remove('fa-check-circle'); 
        document.querySelector(`#div-${campo} .formulario-error`).classList.add('formulario-error-activo');
        campos[campo] = false;
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarformulario);
    input.addEventListener('blur', validarformulario);
});

formulario.addEventListener('submit', (e) => { //Mientras se pulse el boton tipo submit...
    
    if(campos.nombre && campos.telefono && campos.direccion){//Si existen todos estos campos...
        document.getElementById('mensaje-error').classList.remove('mensaje-error-activo');//Quitará el mensaje de error
        document.getElementById('mensaje-correcto').classList.add('mensaje-correcto-activo');//Añadirá el mensaje satisfactorio
        
        document.querySelectorAll('.clase-correcta').forEach((icono) => {
			icono.classList.remove('clase-correcta');//Eliminará los iconos.
		});
    } else {//Mientras que se pulse submit y no exista algun valor...
		document.getElementById('mensaje-error').classList.add('mensaje-error-activo');//Añadirá el mensaje de error
        e.preventDefault();//No enviará los datos
	}
}); 


