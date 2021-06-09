// Porcentaje 0 a 100

const porcentaje = document.querySelector(".contenedor__inicio h1");
const parrafoCargando = document.querySelector(".contenedor__inicio .cargando");
const parrafoBeneficios = document.querySelector(".contenedor__inicio .beneficios");
const beneficios = ["Envío Gratis", "Envío a Domicilio", "Envío Rápido"]
const boton = document.querySelector(".contenedor__inicio button")

let valorPorcentaje = 1
let valorCargando = 1


//boton entrar


paginaInicio();







function paginaInicio() {
    parrafoCargando.classList.remove("oculto");
    setTimeout(() => {
        let intervalo = setInterval(() => {
            valorPorcentaje++;
            porcentaje.textContent = `${valorPorcentaje}%`;
            if (valorPorcentaje === 40) {
                parrafoBeneficios.textContent = beneficios[1]
            } else if (valorPorcentaje === 70) {
                parrafoBeneficios.textContent = beneficios[2]
            }
            if (valorPorcentaje === 100) {
                clearInterval(intervalo);
                clearInterval(intervaloCargando);
                setTimeout(() => {
                    window.location = "ingresar.php"
                }, 300);
            }
        }, 30);
        parrafoBeneficios.textContent = beneficios[0]
    }, 300);
    let intervaloCargando = setInterval(() => {
        if (valorCargando === 3) {
            valorCargando = 1
        } else {
            valorCargando++
        }
        if (valorCargando === 1) {
            parrafoCargando.textContent = "Cargando."
        } else if (valorCargando === 2) {
            parrafoCargando.textContent = "..Cargando.."
        } else {
            parrafoCargando.textContent = "...Cargando..."
        }
    }, 500);
}