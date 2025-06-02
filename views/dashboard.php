<?php
require_once('../app/componentes/header.php');
require_once('../app/componentes/menuLaterel.php');
require_once('../app/componentes/footer.php');
?>
<!DOCTYPE html>
<html lang="es">
<header('Content-Type: text/html; charset=utf-8');
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Sistema Ferremas</title>

  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

<?php
renderHeader();
renderSidebar();
?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Productos</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        <li class="breadcrumb-item active">Productos</li>
      </ol>
    </nav>
  </div>

  <section class="section dashboard">
    <div class="container mt-4">
      <div class="row" id="contenedor-productos"></div>
    </div>
  </section>
</main>

<?php renderFooter(); ?>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
  <i class="bi bi-arrow-up-short"></i>
</a>

<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
  let indicadoresHTML = '';

  fetch('../api/indicadores/indicadores.php')
    .then(res => res.json())
    .then(data => {
      const randomId = Math.random().toString(36).substring(2, 7);
      indicadoresHTML = `
        <div class="accordion mt-2" id="accordion-${randomId}">
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-${randomId}" aria-expanded="false">
                Ver Indicadores Economicos
              </button>
            </h2>
            <div id="collapse-${randomId}" class="accordion-collapse collapse">
              <div class="accordion-body">
                <i class="bi bi-currency-exchange"></i>  <strong>Dolar:</strong> $${parseFloat(data.dolar).toLocaleString('es-CL')}<br>
                <i class="bi bi-currency-euro"></i>  <strong>Euro:</strong> $${parseFloat(data.euro).toLocaleString('es-CL')}<br>
                <i class="bi bi-graph-up"></i>    <strong>UF:</strong> $${parseFloat(data.uf).toLocaleString('es-CL')}<br>
                <i class="bi bi-cash-coin"></i> <strong>UTM:</strong> $${parseFloat(data.utm).toLocaleString('es-CL')}
              </div>
            </div>
          </div>
        </div>
      `;
    })
    .catch(() => {
      indicadoresHTML = `<div class="alert alert-warning mt-2">No se pudo cargar indicadores.</div>`;
    })
    .finally(() => {
      cargarProductos();
    });

  function cargarProductos() {
    fetch('../api/productos/obtener.php')
      .then(res => res.json())
      .then(productos => {
        const contenedor = document.getElementById('contenedor-productos');
        contenedor.innerHTML = '';

        productos.forEach(prod => {
          const card = `
            <div class="col-md-6 col-lg-4 mb-4">
              <div class="card h-100 shadow-sm">
                <img src="../assets/img/productos/${prod.imagen}" class="card-img-top" alt="${prod.nombre}">
                <div class="card-body">
                  <h5 class="card-title">${prod.nombre}</h5>
                  <p class="card-text">
                    <strong>Marca:</strong> ${prod.marca}<br>
                    <strong>Categor铆a:</strong> ${prod.categoria}<br>
                    <strong>Precio:</strong> $${parseInt(prod.precio).toLocaleString('es-CL')}<br>
                    <strong>Stock:</strong> ${prod.stock}
                    ${indicadoresHTML}
                    <div class="d-grid gap-2 mt-3">
                      <button class="btn btn-primary" type="button"
                        onclick="comprarProducto('${prod.codigo_producto}', ${prod.precio})">
                        Comprar ${prod.codigo_producto}
                      </button>
                    </div>
                  </p>
                </div>
              </div>
            </div>
          `;
          contenedor.innerHTML += card;
        });
      })
      .catch(error => {
        console.error("Error al cargar productos:", error);
        document.getElementById('contenedor-productos').innerHTML = `
          <div class="alert alert-danger">Ocurrió un error al cargar los productos.</div>`;
      });
  }
});
</script>

<script>
function comprarProducto(codigo, precio) {
  Swal.fire({
    title: '¿Deseas comprar este producto?',
    text: 'Codigo: ' + codigo + '\nMonto: $' + precio.toLocaleString('es-CL'),
    icon: 'question',
    showCancelButton: true,
    confirmButtonText: 'Si, pagar',
    cancelButtonText: 'Cancelar',
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = `../api/webpay/iniciar_pago.php?codigo=${codigo}&precio=${precio}`;
    }
  });
}
</script>

</body>
</html>
