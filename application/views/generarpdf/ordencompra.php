<html><br><head>
<title>Orden de compra</title>
</head>
<body>
<style>
h3, h4
{
font-family: sans-serif; 
font-size: 18pt; 
font-style: normal; 
font-weight: bold; 
text-align: center; 
}
table{
font-family: sans-serif; 
color:black; 
font-size: 20px; 
font-style: normal;
font-weight: bold;
text-align:left; 
border-collapse: collapse; 
}
</style>
<h3>Orden de compra <?=$orden->id?></h3>
<hr>
<h4>Comprador: <?=$orden->nombre.' '.$orden->apellido;?></h4>
<h4>Domicilio de entrega: <?=$orden->direccion?> - Email: <?=$orden->email;?></h4>
<h4>Telefóno: <?=$orden->telefono;?> - Estado del comprobante: <?=$orden->status;?></h4>
    <table cellpadding = "5" border="1" style="width: 100%;">
    <thead>
    <tr align="left">
        <th>Producto</th>
        <th>Precio</th>
        <th>Unidades</th>
        <th>Total</th>
    </tr>
    </thead>
    
    <tbody>
    <?php foreach($detalles as $detalle) : ?>
    <tr>
    <td><?=$detalle->producto;?></td>
    <td><?=$detalle->precio;?></td>
    <td><?=$detalle->cantidad;?></td>
    <td><?=$detalle->total;?></td>
    </tr>
    <?php endforeach; ?>
    <tr>
        <td>Total de la compra:</td>
        <td></td>
        <td></td>
        <td><?=$orden->total;?></td>
    </tr>
    </tbody>
        
    </table>
    <hr>
    <h4><?=$comercio->comercio?> - <?=$comercio->direccion?> - <?=$comercio->telefono;?></h4>
</body>
</html>