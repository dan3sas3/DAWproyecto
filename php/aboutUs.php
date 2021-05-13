<?php
  require "header.php"
 ?>
 <head>
    <style>
      .centrar{
          margin:auto;
          width:30%;
          padding: 5px;
      }
      .contenido{
        margin:auto;
        width:50%;
        padding: 5px;
      }
      .contenido h1,h2{
        text-align:center;
      }
      .contenido p{
        text-align:justify;
      }
      .grid{
        display:grid;
        grid-template-columns: 1fr 1fr 1fr;
      }
      .grid div:nth-child(even){
        border-right:3px solid gray;
        border-left:3px solid gray;
      }
    </style>
 </head>
  <main>
    <!-- Body -->
    <div class="contenido">
        <h1>¿Quiénes somos?</h1>
        <p>Tienda de lentes online de calidad
            <br><br>Ofrecemos el mejor servicio y atención a nuestros clientes y aseguramos la calidad de nuestro producto y servicio
            <br>Ofrecemos una gama de anteojos y lentes de sol de diseño original y exclusivo. Entendemos que los lentes son una <b>extensión de tu persona</b>; nuestros productos hacen resaltar tus cualidades.
            <br>Tenemos estilos y diseños para todos. Encuentra el que más te guste en nuestra página de productos.
            <br>Hemos desarrollado personal especialmente capacitado en la adaptación de anteojos y lentes de contacto, con un gran sentido de ética y profesionalismo.
        </p>

        <h1>Misión y Visión</h1>
        <h2>Misión:</h2>
        <p style="text-align:center;">Ofrecer la mayor calidad en lentes con el servicio más rápido y eficiente.</p>
        <h2>Visión:</h2>
        <p style="text-align:center;">Posicionarnos como el principal referente en proveedor de lentes de calidad.</p>
    </div>
    <div class=centrar>
      <h1 style="text-align:center;">Contacto</h1>
      <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    </div>
  <div class="grid">
    <div><p style="text-align:center;">kndcontact@kndbusiness.com</p></div>
    <div><p style="text-align:center;">Tel: +525525647244</p></div>
    <div><p style="text-align:center;">© 2021 KnD Peoples S.P.A</p></div>
  </div>
  </main>
</body>
</html>
