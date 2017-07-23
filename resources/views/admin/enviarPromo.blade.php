<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h4>Tenemos las siguientes promociones para ti</h4>
 @foreach($articulo as $art) 
    <td>{{$art->name}}</td>
    <td>{{$art->descripcion}}</td>
    <td>{{$art->precio}}</td>
 @endforeach
</body>
</html>