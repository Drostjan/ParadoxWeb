const formulario = document.getElementById('formulario'); //Acceder al formulario
const inputs = document.querySelectorAll('#formulario input'); //Acceder al id formulario y a todos los inputs de dentro

const expresiones = {
	nombre: /^[a-zA-ZÀ-ÿ]{1,20}\s?[a-zA-ZÀ-ÿ]{1,20}$/, //Acepta de 2 a 20 letras con un espacio y más letras opcionales 
    apellidos: /^[a-zA-ZÀ-ÿ]{1,20}\s?[a-zA-ZÀ-ÿ]{1,20}$/, //Acepta letras con o sin accento y espacios
	psw: /^.{8,25}$/, //Acepta carácteres de 8 a 25 caracteres
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, //Acepta letras + @ +letras + . + letras
	telefono: /^\d{9,9}$/ //Acepta únicamente 9 numeros
}

const campos = {nombre: false, apellidos: false, email: false, psw: false, telefono: false}

const validarformulario = (e) => {//En caso de que el nombre del input sea ""
    switch (e.target.name){
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');//Ejecutará
        break;
        case "apellidos":
            validarCampo(expresiones.apellidos, e.target, 'apellidos');
        break;
        case "email":
            validarCampo(expresiones.email, e.target, 'email');
        break;
        case "psw":
            validarCampo(expresiones.psw, e.target, 'psw');
            validarpsw2();
        break;
        case "psw2":
            validarpsw2();
        break;
        case "telefono":
            validarCampo(expresiones.telefono, e.target, 'telefono');
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

const validarpsw2 = () => {
    const inputpsw1 = document.getElementById('psw');
    const inputpsw2 = document.getElementById('psw2');

    if(inputpsw1.value !== inputpsw2.value){
        document.getElementById(`div-psw2`).classList.add('clase-incorrecta');
        document.getElementById(`div-psw2`).classList.remove('clase-correcta');
        document.querySelector(`#div-psw2 i`).classList.add('fa-times-circle'); /*Eliminar X*/
        document.querySelector(`#div-psw2 i`).classList.remove('fa-check-circle'); 
        document.querySelector(`#div-psw2 .formulario-error`).classList.add('formulario-error-activo');
        campos['psw'] = false;
    } else {
        document.getElementById(`div-psw2`).classList.remove('clase-incorrecta');
        document.getElementById(`div-psw2`).classList.add('clase-correcta');
        document.querySelector(`#div-psw2 i`).classList.remove('fa-times-circle'); /*Eliminar X*/
        document.querySelector(`#div-psw2 i`).classList.add('fa-check-circle'); 
        document.querySelector(`#div-psw2 .formulario-error`).classList.remove('formulario-error-activo');
        campos['psw'] = true;
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarformulario);//Cuando se levante la tecla se ejecutará la función "validar formulario"
});

formulario.addEventListener('submit', (e) => { //Mientras se pulse el boton tipo submit...
    
    if(campos.nombre && campos.apellidos && campos.email && campos.psw && campos.telefono){//Si existen todos estos campos...
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


