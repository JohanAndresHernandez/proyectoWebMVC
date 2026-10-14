<h2>Página de Contacto</h2>

<!-- El controlador inyecta esta variable aquí si existe un mensaje -->
<?php echo $mensaje_db; ?>

<form action="" method="POST" style="display: flex; flex-direction: column; gap: 10px; max-width: 400px;">
            <div>
                <label for="nombre">Tu Nombre:</label><br>
                <input type="text" id="nombre" name="nombre" style="width: 100%; padding: 6px;" required>
            </div>
            
            <div>
                <label for="correo">Correo Electrónico:</label><br>
                <input type="email" id="correo" name="correo" style="width: 100%; padding: 6px;" required>
            </div>
            
            <div>
                <label for="mensaje">Tu Mensaje:</label><br>
                <textarea id="mensaje" name="mensaje" rows="4" style="width: 100%; padding: 6px;" required></textarea>
            </div>
            
            <button type="submit" style="padding: 10px; background-color: #2c3e50; color: white; border: none; cursor: pointer; border-radius: 4px;">Enviar Mensaje</button>
          </form>
