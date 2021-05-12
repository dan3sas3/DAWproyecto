<?php
  require "header.php"
 ?>
 <script type="text/javascript" src="../js/carrito.js"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
 <main>
    <!-- Body -->
    <div class="container">
        <h2>Lista del carrito</h2>
        <p>Estos son los artículos que llevas en tu carrito de compras. Puedes modificarlo si gustas</p>
        <table class="table">
        <thead>
            <tr>
            <th>Artículo</th>
            <th>Descripción del producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>Lentes Ray Ban</td>
            <td>Lentes de sol</td>
            <td>$450.00</td>
            <td>
                <input type="number" value="0" min="0" id="cantidad"/>
            </td>
            <td>$450.00</td>
            </tr>
        </tbody>
        </table>

        <a href="#"><span class="glyphicon glyphicon-remove" style="font-size:15px;cursor:pointer"></a></span>

        <br><br><br>
        <div class="well well-sm">
            <h3>Resumen de la compra</h2>
            <h4>Subtotal de la compra </h3> $450
            <h5>Impuestos</h4> $32
            <h4>Total a pagar </h3> $482
        </div>

        <br><br>
        <button type="button" class="btn btn-success">Comprar</button>

    </div>
  </main>
</body>
</html>
