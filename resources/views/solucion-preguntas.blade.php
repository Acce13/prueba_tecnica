@extends('layouts.app')
@section('title', 'Solucion de las preguntas')

@section('content')
    <div class="my-3">
        <div class="row gy-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Conocimientos en bases de datos</h5>
                        <p>A. Obtenga una lista de todos los productos utilizando sentencias SQL, indicando para cada uno su id_fabricante, id_producto, descripción, precio y precio con I.V.A. incluido (es el precio anterior aumentado en un 10%). </p>
                        <p>Respuesta: </p>
                        <code>SELECT *, (precio + (precio * 0.10)) AS IVA FROM productos;</code>
                        <hr>
                        <p>B. Obtenga todos los productos que en el id_producto lleven 2 ceros consecutivos. </p>
                        <p>Respuesta: </p>
                        <code>SELECT * FROM productos WHERE id_producto LIKE '%00%';</code>
                        <hr>
                        <p>C. Obtenga la cantidad total de existencias por producto. </p>
                        <p>Respuesta: </p>
                        <code>SELECT SUM(existencia) AS cantidad_total FROM productos</code>
                        <hr>
                        <p>D. Obtenga el promedio de precio por fabricante. </p>
                        <p>Respuesta: </p>
                        <code>SELECT id_fabricante, CEILING((SUM(precio) / COUNT(*))) AS Promedio FROM productos GROUP BY id_fabricante</code>
                        <hr>
                        <p>E. Obtenga el producto con mayor precio. </p>
                        <p>Respuesta: </p>
                        <code>SELECT MAX(precio) AS Mayor_Precio FROM productos</code>
                        <hr>
                        <p>F. Cargar en el sistema un nuevo pedido de 500 Curas que envió el fabricante Bic</p>
                        <p>Respuesta: </p>
                        <code>INSERT INTO productos VALUES (9, 'Bic', 'Xk47', 'Curas', 20, 500)</code>
                        <hr>
                        <p>G. El fabricante Qsa ya no es nuestro proveedor y se deben eliminar sus productos de la BD. </p>
                        <p>Respuesta: </p>
                        <code>DELETE FROM productos WHERE id_fabricante = "Qsa"</code>
                        <hr>
                        <p>H. Actualizar la descripción del Id_producto (41002) del fabricante (Aci) con la siguiente descripción (Micropore Grande). </p>
                        <p>Respuesta: </p>
                        <code>UPDATE productos SET descripcion = "Micropore Grande" WHERE id_producto = "41002"</code>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Conocimientos basicos de programacion</h5>
                        <p>A. ¿Qué es una variable? </p>
                        <p>Respuesta: </p>
                        <code>Una variable es un pequeño espacio en memoria.</code>
                        <hr>
                        <p>B. ¿Qué es un ciclo?, ¿mencione dos tipos de ciclos que conozca?</p>
                        <p>Respuesta: </p>
                        <code>Un ciclo es una secuencia de instrucciones que se repite varias veces</code>
                        <br>
                        <code>El ciclo While y el ciclo For</code>
                        <hr>
                        <p>C. ¿Qué es un condicional? </p>
                        <p>Respuesta: </p>
                        <code>Una condicional es una estructura que nos permite elegir entre la ejecucion de una accion u otra</code>
                        <hr>
                        <p>D. En el caso de un estudiante, cuando mencionamos su nombre, edad, sexo, dirección y teléfono, estamos mencionando: </p>
                        <ol>
                            <li>Los atributos de una clase</li>
                            <li>Las operaciones de una clase</li>
                            <li>Los objetos de una clase</li>
                            <li>Ninguna de las anteriores</li>
                        </ol>
                        <p>Respuesta: </p>
                        <code>1. Los atributos de una clase</code>
                        <hr>
                        <p>E. ¿Qué es la programación Orientada a Objetos (POO)?</p>
                        <p>Respuesta: </p>
                        <code>Es un modelo o estilo de programacion, se basa en el concepto de clases y objetos. Es muy util ya que nos permite estructurar un sistema en piezas simples y reutilizables.</code>
                        <hr>
                        <p>F. ¿Cuál operador condicional de PHP evalúa que los valores son iguales y del mismo tipo de datos?</p>
                        <ol>
                            <li>==</li>
                            <li>||</li>
                            <li>===</li>
                            <li>==?</li>
                        </ol>
                        <p>Respuesta: </p>
                        <code>3. ===</code>
                        <hr>
                        <p>G. Desde un punto de vista Booleano, cada valor de cero o string vacío en PHP se considera: </p>
                        <ol>
                            <li>True</li>
                            <li>False</li>
                            <li>Error</li>
                            <li>Null</li>
                        </ol>
                        <code>2. False</code>
                        <hr>
                        <p>H. De la siguiente estructura escriba el resultado final de la variable $c: </p>
                        <p>$a = 1;</p>
                        <p>$b = 9;</p>
                        <p>for ($i = $a; $i <= $b; $i = $i+1) {</p>
                        <p>$c = $a + $b;</p>
                        <p>}</p>
                        <p>echo $c;</p>
                        <p>Respuesta: </p>
                        <code>Resultado es: 10</code>
                        <hr>
                        <p>I. De la siguiente estructura escriba el resultado final de la variable $c: </p>
                        <p>$b = 1;</p>
                        <p>$c = 0;</p>
                        <p>while ($b < 11) {</p>
                        <p>$c = $c + 1;</p>
                        <p>$b = $b + 1;</p>
                        <p>}</p>
                        <p>echo $c;</p>
                        <p>Respuesta: </p>
                        <code>Resultado es: 10</code>
                        <hr>
                        <p>J. De la siguiente estructura escriba el resultado final de la variable $print: </p>
                        <p>$a = 5;</p>
                        <p>$b = 6;</p>
                        <p>$x = 8;</p>
                        <p>$c = 20;</p>
                        <p>$print = "";</p>
                        <p>if ($a <= $b and $b > $c) {</p>
                        <p>if ($x <= $c and $c >= 10) {</p>
                        <p>$print = "Feliz Navidad";</p>
                        <p>}</p>
                        <p>} else {</p>
                        <p>if ($c > $x or $x <= $b) {</p>
                        <p>$print = "Feliz Año";</p>
                        <p>}</p>
                        <p>}</p>
                        <p>echo $print;</p>
                        <p>Respuesta: </p>
                        <code>Resultado es: Feliz Año</code>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection