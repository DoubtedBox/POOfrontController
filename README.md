# Actividad: Uso de POO para crear un front Controller
## Información del Autor

- **Nombre**: Can Cime Rodrigo Alexander
- **Número de Control**: 21390319
- **Materia**: Desarrollo Web II
- **Fecha**: 26 de marzo de 2025
## Descripción

Este proyecto implementa el manejo de solicitudes HTTP (`GET`, `POST`, `PUT`, `DELETE`) en PHP utilizando un enfoque basado en clases. La clase `Producto` contiene métodos estáticos para procesar estas solicitudes, y el archivo `index.php` llama dinámicamente al método correspondiente según el tipo de solicitud HTTP.

## Estructura de Archivos
```
c:\xampp\htdocs\mvc
├── index.php       # Punto de entrada principal para manejar solicitudes HTTP
├── Producto.php    # Contiene la clase Producto con métodos estáticos
```
### Archivos

1. **`index.php`**:
   - Maneja las solicitudes HTTP entrantes.
   - Extrae el método de la solicitud y los parámetros.
   - Llama dinámicamente al método correspondiente de la clase `Producto`.

2. **`Producto.php`**:
   - Define la clase `Producto`.
   - Contiene métodos estáticos (`get`, `post`, `put`, `delete`) para manejar diferentes tipos de solicitudes HTTP.

## Cómo Funciona

### Mapeo de Solicitudes HTTP

| Método HTTP | Ejemplo de Solicitud                | Método Llamado                  |
|-------------|-------------------------------------|----------------------------------|
| `GET`       | `GET localhost/producto/1`         | `Producto::get(1)`              |
| `POST`      | `POST localhost/producto/`         | `Producto::post($body)`         |
| `PUT`       | `PUT localhost/producto/`          | `Producto::put($body)`          |
| `DELETE`    | `DELETE localhost/producto/2`      | `Producto::delete(2)`           |

### Ejemplos de Solicitudes

1. **Solicitud GET**:
   - URL: `http://localhost/producto/1`
   - Salida: `Se ejecutó Producto::get con ID: 1`

2. **Solicitud POST**:
   - URL: `http://localhost/producto/`
   - Cuerpo: 
     ```json
     {
       "id": 2,
       "nombre": "laptop",
       "precio": 10000
     }
     ```
   - Salida: `Se ejecutó Producto::post con datos: {"id":2,"nombre":"laptop","precio":10000}`

3. **Solicitud PUT**:
   - URL: `http://localhost/producto/`
   - Cuerpo: 
     ```json
     {
       "id": 2,
       "nombre": "Computadora de escritorio",
       "precio": 15000
     }
     ```
   - Salida: `Se ejecutó Producto::put con datos: {"id":2,"nombre":"Computadora de escritorio","precio":15000}`

4. **Solicitud DELETE**:
   - URL: `http://localhost/producto/2`
   - Salida: `Se ejecutó Producto::delete con ID: 2`

## Cómo Ejecutar

1. Coloca los archivos (`index.php` y `Producto.php`) en el directorio `mvc`.
2. Inicia el servidor XAMPP.
3. Abre un navegador o utiliza una herramienta como Postman para enviar solicitudes HTTP a `http://localhost/mvc/index.php`.

## Descripción del Código

### Producto.php

La clase `Producto` contiene los siguientes métodos estáticos:

- **`get($id)`**: Maneja solicitudes `GET`. Recibe un ID y devuelve un mensaje.
- **`post($obj)`**: Maneja solicitudes `POST`. Recibe un objeto JSON y devuelve un mensaje con los datos.
- **`put($obj)`**: Maneja solicitudes `PUT`. Recibe un objeto JSON y devuelve un mensaje con los datos.
- **`delete($id)`**: Maneja solicitudes `DELETE`. Recibe un ID y devuelve un mensaje.

### index.php

- Extrae el método HTTP y los parámetros de la solicitud.
- Llama dinámicamente al método correspondiente de la clase `Producto` utilizando `call_user_func`.

## Ejemplo de Salida

Para una solicitud `GET` a `http://localhost/producto/1`, la salida será:

```
Se ejecutó Producto::get con ID: 1
```