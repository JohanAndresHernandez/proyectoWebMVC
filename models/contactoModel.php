<?php
// models/ContactoModel.php

class ContactoModel {
    private $db;

    public function __construct($conexion) {
        $this->db = $conexion;
    }

    public function guardarContacto($nombre_contacto, $correo_contacto, $mensaje_texto) {
          if (filter_var($correo_contacto, FILTER_VALIDATE_EMAIL)) {
                try {
                    // Actualizamos la consulta SQL para incluir los 3 marcadores correspondientes
                    $sql = "INSERT INTO contactos (nombre, correo, mensaje) VALUES (:nombre, :correo, :mensaje)";
                    $stmt = $this->db->prepare($sql);
                    
                    // Vinculamos y ejecutamos de forma segura los 3 datos
                    $stmt->execute([
                        ':nombre'  => $nombre_contacto,
                        ':correo'  => $correo_contacto,
                        ':mensaje' => $mensaje_texto
                    ]);
                    
                    $mensaje_db = "<p style='color: green; font-weight: bold;'>¡Tu mensaje y correo han sido guardados con éxito!</p>";
                } catch (PDOException $e) {
                    $mensaje_db = "<p style='color: red;'>Error en la base de datos: " . $e->getMessage() . "</p>";
                }

    }
}
}
