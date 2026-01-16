
<?php
// --------------------------------------------
// index.php — U4 S9 Tarea de GET y POST en PHP
// Luis Sanchez Herrera
// 2026-01-15
// --------------------------------------------

// 1) LECTURA DE PARÁMETROS GET (para navegación)
$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : null;

// 2) LECTURA DE PARÁMETROS POST (para uso del formulario)
$metodo = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$nombre = null;
$correo = null;

if ($metodo === 'POST') {
    // Nota: No se hace ninguna validación, según las instrucciones.
    // Se usa htmlspecialchars solo para mostrar de forma segura en HTML.
    $nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '';
    $correo = isset($_POST['correo']) ? htmlspecialchars($_POST['correo']) : '';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>U4S9 Tarea de GET y POST en PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="estilos.css" />
    <style>
        /* Estilos mínimos por si no se carga estilos.css */
        body { font-family: Arial, sans-serif; margin: 0; background: #f6f7fb; color: #222; }
        header { background: #1f4b99; color: white; padding: 16px; }
        .contenedor { max-width: 960px; margin: 0 auto; padding: 16px; }
        nav a { color: white; margin-right: 12px; text-decoration: none; font-weight: 600; }
        nav a:hover { text-decoration: underline; }
        .tarjeta { background: white; border-radius: 8px; padding: 16px; box-shadow: 0 2px 10px rgba(0,0,0,.06); margin: 16px 0; }
        .titulo { margin-top: 0; }
        .fila { margin-bottom: 12px; }
        label { display: block; font-size: 14px; margin-bottom: 6px; }
        input[type="text"], input[type="email"] {
            width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px;
        }
        button { background: #1f4b99; color: white; border: none; padding: 10px 16px; border-radius: 6px; cursor: pointer; }
        button:hover { background: #183a78; }
        .badge { display: inline-block; background: #eef3ff; color: #1f4b99; padding: 4px 10px; border-radius: 999px; font-size: 12px; margin-left: 8px; }
        .resaltado { background: #eef8ee; border: 1px solid #cfe9cf; padding: 10px; border-radius: 6px; }
        .nota { color: #555; font-size: 14px; }
        footer { color: #777; font-size: 13px; padding: 16px; text-align: center; }
    </style>
</head>
<body>
    <header>
        <div class="contenedor">
            <h1 style="margin:0;">U4S9 Tarea: Uso de GET y POST en PHP</h1>
            <nav style="margin-top:8px;">
                <!-- A. Enlaces que usan GET para indicar la sección -->
                <a href="index.php?seccion=Inicio">Inicio</a>
                <a href="index.php?seccion=Unidades">Unidades</a>
                <a href="index.php?seccion=Contacto">Contacto</a>
                <span class="badge">GET</span>
            </nav>
        </div>
    </header>

    <main class="contenedor">
        <!-- Panel de navegación/estado GET -->
        <section class="tarjeta">
            <h2 class="titulo">A. Navegación para validar método GET</h2>
            <p class="nota">Haz clic en cualquier enlace del menú superior. El parámetro <code>?seccion=...</code> se envía al servidor con <strong>GET</strong>, y abajo verás lo que recibió.</p>

            <?php if ($seccion): ?>
                <div class="resaltado">
                    <strong>Sección seleccionada:</strong> 
                    <?php echo htmlspecialchars($seccion); ?>
                </div>
            <?php else: ?>
                <div class="resaltado">
                    <strong>Sin sección seleccionada.</strong> (Prueba con los enlaces de arriba.)
                </div>
            <?php endif; ?>
        </section>

        <!-- Formulario POST -->
        <section class="tarjeta">
            <h2 class="titulo">B. Formulario de Contacto para validar método POST</h2>
            <p class="nota">Completa y envía el formulario. Los datos se enviarán por método <strong>POST</strong> al mismo archivo (<code>index.php</code>), y se mostrarán abajo. Nota: no ejecuta ninguna otra acción.</p>

            <form method="POST" action="index.php">
                <div class="fila">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required />
                </div>
                <div class="fila">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" placeholder="tucorreo@ejemplo.com" required />
                </div>
                <button type="submit">Enviar</button>
                <span class="badge">POST</span>
            </form>

            <?php if ($metodo === 'POST'): ?>
                <div style="margin-top:16px;" class="resaltado">
                    <strong>Datos recibidos por POST:</strong><br />
                    Nombre: <?php echo $nombre !== null ? $nombre : ''; ?><br />
                    Correo: <?php echo $correo !== null ? $correo : ''; ?>
                </div>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        © <?php echo date('Y'); ?> - Tarea de GET y POST en PHP
    </footer>
</body>
</html>
