<?php

/***
 * Modificar el código para que las funciones sean métodos de una clase llamada Producto.
 * Usar una función php para llamar al método correspondiente de la clase Producto,
 * dependiendo del método http usado en la solicitud. Ejemplo:
 * 
 *     Petición				|		Método a ejecutar
 * -------------------------------------------------------------
 * GET localhost/producto/1       	Producto::get(10) 
 * POST localhost/producto/		  	Producto::post({"id":2, "nombre":"laptop", "precio":10000})
 *  body: 
 * 		{"id":2, 
 * 		 "nombre":"laptop", 
 * 		 "precio":10000}
 * 
 * PUT localhost/producto/		  	Producto::post({"id":2, "nombre":"Computadora de escritorio", "precio":15000})
 *  body: 
 * 		{"id":2, 
 * 		 "nombre":"Computadora de escritorio", 
 * 		 "precio":15000}
 * 
 * DELETE localhost/producto/2    	Producto::delete(2) 
 */

 require_once 'Producto.php'; // Import the Producto class

// Mostrar información básica de la solicitud
echo "Hola mundo<br/>";
echo "Ruta solicitada: " . ($_GET['PATH_INFO'] ?? '') . "<br/>";
echo "Método HTTP: {$_SERVER['REQUEST_METHOD']}<br/>";

// Obtener los parámetros de la solicitud
$parameters = explode('/', $_GET['PATH_INFO'] ?? '');
$recurso = $parameters[0] ?? null;
$request_method = strtolower($_SERVER['REQUEST_METHOD']);

// Determinar el método de la clase Producto a ejecutar
$method = $request_method;

// Procesar la solicitud según el método HTTP
switch ($method) {
    case 'get':
    case 'delete':
        // Para GET y DELETE, se espera un ID como parámetro
        $id = $parameters[1] ?? null;
        $resultado = call_user_func([Producto::class, $method], $id);
        break;

    case 'post':
    case 'put':
        // Para POST y PUT, se espera un cuerpo JSON
        $body = json_decode(file_get_contents('php://input'), true);
        $resultado = call_user_func([Producto::class, $method], $body);
        break;

    default:
        // Método HTTP no soportado
        $resultado = "Método HTTP no soportado.";
        break;
}

// Mostrar el resultado de la operación
echo "Resultado: " . $resultado . "<br/>";
