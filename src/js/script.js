// TIENDA

//GALERIA




const galeria = document.querySelector(".galeria");

const siguiente = document.querySelector(".siguiente");
const anterior = document.querySelector(".anterior");
const todo = document.querySelector(".contenedor_principal")
const body = document.querySelector("body")



/// Moviendo la galeria manualmente
let numGaleria = 1;
siguiente.addEventListener("click", function() {
    if (numGaleria === 1) {
        galeria.style.backgroundImage = "URL('build/img/galeria2.webp')";
        numGaleria++;
    } else if (numGaleria === 2) {
        galeria.style.backgroundImage = "URL('build/img/galeria3.webp')";
        numGaleria++;
    } else {
        galeria.style.backgroundImage = "URL('build/img/galeria1.webp')";
        numGaleria = 1
    }
})
anterior.addEventListener("click", function() {
    if (numGaleria === 3) {
        galeria.style.backgroundImage = "URL('build/img/galeria2.webp')";
        numGaleria--;
    } else if (numGaleria === 2) {
        galeria.style.backgroundImage = "URL('build/img/galeria1.webp')";
        numGaleria--;
    } else {
        galeria.style.backgroundImage = "URL('build/img/galeria3.webp')";
        numGaleria = 3
    }

})



let primerClick = false;








galeria.addEventListener("click", function() {

    // Paro el movimiento de la galeria
    clearInterval(intervaloMoverGaleria)
    galeria.style.backgroundPositionX = "-2.2rem";
    // Muestra las flechas
    primerClick = true;
    console.log(primerClick)
    siguiente.classList.remove("oculto");
    anterior.classList.remove("oculto");
    // Indico que es el primer click que doy
    // Deja de mostrar las flechas (cada 4 segundoos o si doy click en otro lado)
    function dejarDeMostrarFlechas() {
        siguiente.classList.add("oculto");
        anterior.classList.add("oculto");
    }

    function dejarDeMostrarEn4s() {
        setTimeout(() => {
            dejarDeMostrarFlechas()
        }, 10000);
    }
    dejarDeMostrarEn4s();

    // Crea la Foto en Grande cuando le da click
    galeria.addEventListener("click", function() {
        // Indico que es el segundo Click
        // Creo la foto y el parrafo

        const foto = document.createElement("IMG");
        const cruz = document.createElement("P");

        // Caraceristicas de la foto
        foto.src = `build/img/galeria${numGaleria}.webp`;
        foto.classList.add("galeria-foto");
        foto.classList.remove("oculto")

        // Características de la cruz
        cruz.textContent = "X"
        cruz.classList.remove("oculto2")
        cruz.classList.add("cruz")


        // Crear Flechas



        // Cuelgo todo
        todo.appendChild(cruz);
        todo.appendChild(foto);


        // Cerrando la foto

        todo.addEventListener("click", function(e) {
            // console.log(e.target.classList.value)
            // Si da click afuera de la foto
            if (e.target.classList.value != "galeria" && e.target.classList.value != "galeria-foto") {
                cruz.classList.add("oculto2");
                foto.classList.add("oculto2");

            }


        })

        // si da click en la cruz
        cruz.addEventListener("click", function() {
            foto.classList.add("oculto");
            cruz.classList.add("oculto");


        })
    })
});
galeria.style.backgroundSize = "contain";
galeria.style.backgroundPositionY = "center";
galeria.style.backgroundRepeat = "none";

function cambiarGaleriaAuto() {
    let numImg = 1;

    setInterval(() => {
        galeria.style.backgroundImage = `URL("build/img/galeria${numImg}.webp")`;


        if (numImg === 1 || numImg === 2) {
            numImg++
        } else {

            numImg = 1;

        }
    }, 2000);
}

cambiarGaleriaAuto()


let intervaloMoverGaleria;

function moverGaleria() {

    valor = 0;
    intervaloMoverGaleria = setInterval(() => {
        valor += .125;
        galeria.style.backgroundPositionX = `${valor}rem`;

        console.log(galeria.style.backgroundPositionX)
    }, 10);

}

moverGaleria()







// console.log(siguiente)