// const contenedorProductos = document.querySelector(".contenedor-productos")
// Trayendo de la base de datos



// async function crearProductos() {
//     try {
//         const resultado = await fetch("./productos.json");
//         const db = await resultado.json();
//         console.log(db);
//         const { productos } = db;
//         console.log(productos)

//         productos.forEach(function(producto) {
//             //desestructurando el arreglo productos
//             console.log(producto)
//             const { id, nombre, precio } = producto;


//             //Creando el contenedor del producto
//             const divProducto = document.createElement("DIV");
//             divProducto.classList.add("producto");

//             //Creando la imagen del producto
//             const imgProducto = document.createElement("IMG");
//             imgProducto.src = `../build/img/${nombre}.jpg`

//             console.log(imgProducto)
//                 // Creando los parrafos para precio y nombre
//             const parrafoNombre = document.createElement("P");
//             parrafoNombre.classList.add("nombre")
//             parrafoNombre.textContent = nombre

//             const parrafoPrecio = document.createElement("P");
//             parrafoPrecio.classList.add("precio");
//             parrafoPrecio.textContent = `$${precio}`

//             //Poniendo los parrafos en el div

//             divProducto.appendChild(parrafoNombre)
//             divProducto.appendChild(imgProducto)
//             divProducto.appendChild(parrafoPrecio)
//             contenedorProductos.appendChild(divProducto)
//             console.log("producto")

//         })
//     } catch {
//         console.log(error)s
//     }
// }

// crearProductos()