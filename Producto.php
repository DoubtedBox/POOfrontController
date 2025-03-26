<?php

// Clase Producto que contiene métodos estáticos para manejar diferentes solicitudes HTTP
class Producto
{
    // Método para manejar solicitudes GET
    // Recibe un ID como parámetro y devuelve un mensaje indicando que se ejecutó el método GET
    public static function get($id)
    {
        return "<br/>Se ejecutó Producto::get con ID: {$id} <br/>";
    }

    // Método para manejar solicitudes POST
    // Recibe un objeto (array asociativo) como parámetro y devuelve un mensaje con los datos recibidos
    public static function post($obj)
    {
        return "<br/>Se ejecutó Producto::post con datos: " . json_encode($obj) . " <br/>";
    }

    // Método para manejar solicitudes DELETE
    // Recibe un ID como parámetro y devuelve un mensaje indicando que se ejecutó el método DELETE
    public static function delete($id)
    {
        return "<br/>Se ejecutó Producto::delete con ID: {$id} <br/>";
    }

    // Método para manejar solicitudes PUT
    // Recibe un objeto (array asociativo) como parámetro y devuelve un mensaje con los datos recibidos
    public static function put($obj)
    {
        return "<br/>Se ejecutó Producto::put con datos: " . json_encode($obj) . " <br/>";
    }
}
