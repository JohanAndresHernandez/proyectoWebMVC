<?php
// controllers/SiteController.php
require_once 'models/ContactoModel.php';

class SiteController {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    public function manejarPeticion() {
        // Capturar sección actual
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'inicio';
        $mensaje_db = "";

        // Procesar formulario si es la sección contacto y viene por POST
        if ($url === 'contactanos' && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre'])) {
            $nombre_contacto = trim($_POST['nombre']);
            $correo_contacto = trim($_POST['correo']);
            $mensaje_texto = trim($_POST['mensaje']);

            if (!empty($nombre_contacto) && !empty($correo_contacto) && !empty($mensaje_texto)) {
                $modelo = new ContactoModel($this->conexion);
                $exito = $modelo->guardarContacto($nombre_contacto, $correo_contacto, $mensaje_texto);

                if ($exito) {
                    $mensaje_db = "<p style='color: green; font-weight: bold;'>¡Mensaje guardado con éxito en la Base de Datos!</p>";
                } else {
                    $mensaje_db = "<p style='color: red;'>Error al guardar en la base de datos.</p>";
                }
            } else {
                $mensaje_db = "<p style='color: red;'>Por favor, escribe un nombre válido.</p>";
            }
        }

        // Cargar los componentes visuales (Vistas)
        require_once 'views/header.php';

        switch ($url) {
             case 'inicio':
        require_once 'views/inicio.php';
        break;

    case 'mostrar':
        require_once 'views/mostrar.php';
        break;

    case 'modelos':
        require_once 'views/modelos.php';
        break;

    case 'servicios':
        require_once 'views/servicios.php';
        break;

    case 'contactanos':
        require_once 'views/contacto.php';
        break;

    default:
        require_once 'views/404.php';
        break;
        }

        require_once 'views/footer.php';
    }
}
