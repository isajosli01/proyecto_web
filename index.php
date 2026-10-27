<?php
session_start();
include("conexion.php");

// Consultar los productos en la base de datos
$sql_productos = "SELECT p.*, c.nombre AS categoria_nombre 
                  FROM producto p 
                  INNER JOIN categoria c ON p.id_categoria = c.id 
                  ORDER BY p.id DESC";
$resultado_productos = $conexion->query($sql_productos);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAK-PC | Componentes y Periféricos</title>
    
    <!-- Librería Font Awesome para Íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Vinculación al archivo CSS -->
    <link rel="stylesheet" href="style.css">

    <style>
        /* Estilos adicionales para los botones de usuario en el menú */
        .user-menu-nav {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-badge-nav {
            color: #38bdf8;
            font-size: 14px;
            font-weight: 600;
            background: rgba(56, 189, 248, 0.1);
            padding: 6px 12px;
            border-radius: 6px;
            border: 1px solid rgba(56, 189, 248, 0.2);
        }
        .nav-btn-login {
            background: transparent;
            color: #38bdf8;
            border: 1px solid #38bdf8;
            padding: 7px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .nav-btn-login:hover {
            background: #38bdf8;
            color: #0f172a;
        }
        .nav-btn-register {
            background: #2563eb;
            color: white;
            padding: 7px 14px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }
        .nav-btn-admin {
            background: #eab308;
            color: #0f172a;
            padding: 7px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
        }
        .nav-btn-logout {
            background: #ef4444;
            color: white;
            padding: 7px 10px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
        }
        .badge-stock {
            background: rgba(34, 197, 94, 0.15);
            color: #4ade80;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <!-- Encabezado / Navegación -->
    <header class="header">
        <div class="container logo-nav-container">
            <a href="#" class="logo">
                <img src="img/logo1.png" alt="MAK-PC Logo" class="logo-img">
                <span class="logo-text">MAK-PC</span>
            </a>
            <nav class="navigation">
                <ul>
                    <li><a href="#inicio"><i class="fas fa-home"></i> Inicio</a></li>
                    <li><a href="#productos"><i class="fas fa-microchip"></i> Productos</a></li>
                    <li><a href="#ubicacion"><i class="fas fa-map-marker-alt"></i> Ubicación</a></li>
                    <li><a href="#contacto"><i class="fas fa-envelope"></i> Contacto</a></li>
                    <li>
                        <button id="openModalNav" class="nav-btn-about">
                            <i class="fas fa-building"></i> Sobre Nosotros
                        </button>
                    </li>
                    
                    <!-- SISTEMA DE USUARIOS EN EL MENÚ -->
                    <li class="user-menu-nav">
                        <?php if (isset($_SESSION['usuario'])): ?>
                            <span class="user-badge-nav"><i class="fas fa-user-check"></i> <?php echo $_SESSION['usuario']; ?></span>
                            <a href="admin.php" class="nav-btn-admin"><i class="fas fa-gauge"></i> Panel</a>
                            <a href="logout.php" class="nav-btn-logout"><i class="fas fa-right-from-bracket"></i> Salir</a>
                        <?php else: ?>
                            <a href="login.php" class="nav-btn-login"><i class="fas fa-right-to-bracket"></i> Iniciar Sesión</a>
                            <a href="registro.php" class="nav-btn-register">Registrarse</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Banner Principal (Portada) -->
    <section id="inicio" class="hero">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <p class="subtitle">HARDWARE & GAMING HARDWARE</p>
            <h1>Lleva tu computadora al siguiente nivel</h1>
            <p>Ofrecemos los mejores periféricos, componentes de almacenamiento y memorias RAM de alta velocidad con garantía asegurada.</p>
            <div class="hero-actions">
                <a href="#productos" class="btn"><i class="fas fa-shopping-cart"></i> Ver Catálogo</a>
                <button id="openModalHero" class="btn btn-outline-light"><i class="fas fa-info-circle"></i> Conócenos</button>
            </div>
        </div>
    </section>

    <!-- Sección de Productos Dinámicos -->
    <section id="productos" class="products">
        <div class="container">
            <h2 class="section-title">Productos Destacados</h2>
            <p class="section-subtitle">Encuentra los mejores componentes para potenciar tu equipo</p>

            <div class="product-grid">
                
                <?php if ($resultado_productos && $resultado_productos->num_rows > 0): ?>
                    <?php while ($prod = $resultado_productos->fetch_assoc()): ?>
                        <div class="product-card">
                            <div class="card-img">
                                <img src="<?php echo !empty($prod['imagen']) ? $prod['imagen'] : 'img/ram-fury.jpg'; ?>" alt="<?php echo $prod['nombre']; ?>">
                            </div>
                            <div class="card-body">
                                <span class="category"><?php echo $prod['categoria_nombre']; ?></span>
                                <h3><?php echo $prod['nombre']; ?></h3>
                                <p><?php echo $prod['descripcion']; ?></p>
                                <div class="card-footer">
                                    <span class="price">S/ <?php echo number_format($prod['precio'], 2); ?></span>
                                    <span class="badge-stock">Stock: <?php echo $prod['stock']; ?></span>
                                    <a href="#contacto" class="btn-sm">Consultar</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p style="text-align: center; color: #94a3b8; width: 100%;">No hay productos registrados en la base de datos.</p>
                <?php endif; ?>

            </div>
        </div>
    </section>

    <!-- Sección Ubicación -->
    <section id="ubicacion" class="location-section">
        <div class="container">
            <h2 class="section-title">Nuestra Ubicación</h2>
            <p class="section-subtitle">Visítanos directamente en nuestro local comercial</p>

            <div class="single-location-card">
                <h3><i class="fas fa-store text-accent"></i> Local MAK-PC</h3>
                
                <div class="location-details">
                    <p><i class="fas fa-map-pin text-accent"></i> <strong>Ubicación exacta:</strong> Encuéntranos directamente en nuestro local comercial.</p>
                    <p><i class="fas fa-compass text-accent"></i> <strong>Referencia cercana:</strong> A pocos metros de este punto clave de referencia para facilitar tu llegada.</p>
                    <p><i class="far fa-clock text-accent"></i> <strong>Horarios:</strong> Lunes a Viernes: 9:00 AM - 7:00 PM | Sábados: 9:00 AM - 4:00 PM</p>
                </div>

                <div class="map-actions">
                    <a href="https://maps.app.goo.gl/AV2GV7CtRt97N5fEA" target="_blank" rel="noopener noreferrer" class="btn">
                        <i class="fas fa-directions"></i> Ver Ubicación Exacta
                    </a>
                    <a href="https://maps.app.goo.gl/3vN3caX8tCHhRhyGA" target="_blank" rel="noopener noreferrer" class="btn btn-outline">
                        <i class="fas fa-street-view"></i> Ver Punto de Referencia
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Contacto y Datos Fiscales -->
    <section id="contacto" class="contact-section">
        <div class="container">
            <h2 class="section-title">Contacto y Datos de la Empresa</h2>
            <p class="section-subtitle">Ponte en contacto con nosotros o consulta nuestra información corporativa</p>

            <div class="contact-grid">
                <div class="contact-card">
                    <h3><i class="fas fa-headset text-accent"></i> Canales de Atención</h3>
                    <ul class="contact-list">
                        <li>
                            <div class="social-icon icon-phone"><i class="fas fa-phone-alt"></i></div>
                            <div class="social-text"><strong>Teléfono:</strong> <a href="tel:+51975513327">975 513 327</a></div>
                        </li>
                        <li>
                            <div class="social-icon icon-whatsapp"><i class="fab fa-whatsapp"></i></div>
                            <div class="social-text"><strong>WhatsApp:</strong> <a href="https://wa.me/51975513327" target="_blank" rel="noopener noreferrer">975 513 327</a></div>
                        </li>
                        <li>
                            <div class="social-icon icon-facebook"><i class="fab fa-facebook-f"></i></div>
                            <div class="social-text"><strong>Facebook:</strong> <a href="https://www.facebook.com/mak.pc.enterprises.sac" target="_blank" rel="noopener noreferrer">@mak.pc.enterprises.sac</a></div>
                        </li>
                        <li>
                            <div class="social-icon icon-tiktok"><i class="fab fa-tiktok"></i></div>
                            <div class="social-text"><strong>TikTok:</strong> <a href="https://www.tiktok.com/@makpc_tumbes" target="_blank" rel="noopener noreferrer">@makpc_tumbes</a></div>
                        </li>
                    </ul>
                </div>

                <div class="contact-card company-info-card">
                    <h3><i class="fas fa-shield-alt text-accent"></i> Información Legal</h3>
                    <div class="company-details">
                        <p><i class="fas fa-file-contract"></i> <strong>Razón Social:</strong> MAK PC S.A.C.</p>
                        <p><i class="fas fa-id-card"></i> <strong>RUC:</strong> 20409456520</p>
                        <p><i class="fas fa-briefcase"></i> <strong>Tipo de Empresa:</strong> Sociedad Anónima Cerrada</p>
                        <p><i class="fas fa-map-marked-alt"></i> <strong>Dirección:</strong> Cal. Simón Bolívar Nro. 461 Int. 001</p>
                        <p><i class="fas fa-city"></i> <strong>Ubicación:</strong> Tumbes, Perú</p>
                        <p><i class="fas fa-check-circle"></i> <strong>Estado Domicilio:</strong> <span class="badge-status">Habido</span></p>
                        <p><i class="fas fa-tag"></i> <strong>CIIU:</strong> 72909</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal (Sobre la Empresa) -->
    <div id="aboutModal" class="modal-overlay">
        <div class="modal-card">
            <button id="closeModal" class="modal-close">&times;</button>
            <div class="modal-header">
                <span class="modal-badge"><i class="fas fa-award"></i> 25 Años de Experiencia</span>
                <h2>MAK-PC ENTERPRISES SAC</h2>
            </div>
            <div class="modal-body">
                <p>Con un legado de 25 años, en <strong>MAK-PC Enterprise SAC</strong> nos enorgullece ser su socio tecnológico de confianza. Ofrecemos soluciones de vanguardia y un soporte especializado inigualable, diseñados para impulsar su crecimiento.</p>
                <p>Su confianza es nuestro mayor activo y su éxito, nuestro principal objetivo. Juntos, construimos el futuro digital.</p>
                
                <div class="modal-socials">
                    <p><strong>Síguenos en redes:</strong></p>
                    <div class="modal-social-icons">
                        <a href="https://www.facebook.com/mak.pc.enterprises.sac" target="_blank" class="social-badge fb"><i class="fab fa-facebook-f"></i> Facebook</a>
                        <a href="https://www.tiktok.com/@makpc_tumbes" target="_blank" class="social-badge tt"><i class="fab fa-tiktok"></i> TikTok</a>
                        <a href="https://wa.me/51975513327" target="_blank" class="social-badge wa"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="acceptModal" class="btn"><i class="fas fa-check"></i> Entendido</button>
            </div>
        </div>
    </div>

    <!-- ASISTENTE VIRTUAL MAKBOT -->
    <div class="chatbot-container">
        <button id="chatToggle" class="chat-toggle-btn">
            <i class="fas fa-robot"></i>
            <span class="notification-dot"></span>
        </button>

        <div id="chatWindow" class="chat-window">
            <div class="chat-header">
                <div class="chat-header-info">
                    <div class="bot-avatar"><i class="fas fa-robot"></i></div>
                    <div>
                        <h4>MakBot</h4>
                        <span class="online-status"><i class="fas fa-circle"></i> En línea</span>
                    </div>
                </div>
                <button id="closeChat" class="chat-close-btn">&times;</button>
            </div>

            <div id="chatBody" class="chat-body">
                <div class="chat-message bot">
                    ¡Hola! 👋 Mi nombre es <strong>MakBot</strong>, tu asistente virtual en MAK-PC. ¿En qué te puedo colaborar hoy?
                </div>
                <div class="chat-options">
                    <button class="chat-opt-btn" onclick="sendOption('Horarios y Dirección')">📍 Horarios y Dirección</button>
                    <button class="chat-opt-btn" onclick="sendOption('Garantías y Soporte')">🛡️ Garantías y Soporte</button>
                    <button class="chat-opt-btn" onclick="sendOption('Catálogo de Productos')">💻 Catálogo de Productos</button>
                    <button class="chat-opt-btn" onclick="sendOption('Hablar con un Asesor')">💬 Hablar con un Asesor</button>
                </div>
            </div>

            <div class="chat-footer">
                <input type="text" id="chatInput" placeholder="Escribe tu mensaje a MakBot..." onkeypress="handleKeyPress(event)">
                <button id="sendBtn" onclick="sendMessage()"><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-content">
            <p>&copy; 2026 MAK PC S.A.C. - Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- JavaScript Original de tu Archivo -->
    <script>
        const modal = document.getElementById('aboutModal');
        const openBtnNav = document.getElementById('openModalNav');
        const openBtnHero = document.getElementById('openModalHero');
        const closeModalBtn = document.getElementById('closeModal');
        const acceptBtn = document.getElementById('acceptModal');

        function openModal() { modal.classList.add('active'); }
        function closeModal() { modal.classList.remove('active'); }

        openBtnNav.addEventListener('click', openModal);
        openBtnHero.addEventListener('click', openModal);
        closeModalBtn.addEventListener('click', closeModal);
        acceptBtn.addEventListener('click', closeModal);

        window.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });

        // LÓGICA DE MAKBOT
        const chatToggle = document.getElementById('chatToggle');
        const chatWindow = document.getElementById('chatWindow');
        const closeChat = document.getElementById('closeChat');
        const chatBody = document.getElementById('chatBody');
        const chatInput = document.getElementById('chatInput');

        chatToggle.addEventListener('click', () => { chatWindow.classList.toggle('active'); });
        closeChat.addEventListener('click', () => { chatWindow.classList.remove('active'); });

        function handleKeyPress(e) { if (e.key === 'Enter') sendMessage(); }

        function sendMessage() {
            const text = chatInput.value.trim();
            if (text === '') return;
            appendMessage(text, 'user');
            chatInput.value = '';
            setTimeout(() => { processResponse(text.toLowerCase()); }, 600);
        }

        function sendOption(optionText) {
            appendMessage(optionText, 'user');
            setTimeout(() => { processResponse(optionText.toLowerCase()); }, 500);
        }

        function appendMessage(text, sender) {
            const msgDiv = document.createElement('div');
            msgDiv.classList.add('chat-message', sender);
            msgDiv.innerHTML = text;
            chatBody.appendChild(msgDiv);
            chatBody.scrollTop = chatBody.scrollHeight;
        }

        function processResponse(input) {
            let reply = "";
            if (input.includes('horario') || input.includes('dirección') || input.includes('ubicacion')) {
                reply = "📍 En MAK-PC estamos ubicados en <strong>Cal. Simón Bolívar Nro. 461 Int. 001, Tumbes</strong>.<br>⏰ Atendemos de Lunes a Viernes de 9:00 AM a 7:00 PM y Sábados de 9:00 AM a 4:00 PM.";
            } else if (input.includes('garantía') || input.includes('garantia') || input.includes('soporte')) {
                reply = "🛡️ En MAK-PC contamos con 25 años de trayectoria brindando garantía oficial y soporte técnico especializado.";
            } else if (input.includes('producto') || input.includes('catálogo') || input.includes('catalogo') || input.includes('precio')) {
                reply = "💻 Contamos con stock en memorias RAM, SSDs M.2 NVMe, periféricos gamer y más. Puedes revisar el catálogo en nuestra web.";
            } else if (input.includes('asesor') || input.includes('whatsapp') || input.includes('humano')) {
                reply = "💬 ¿Necesitas una atención directa? Contacta a uno de nuestros asesores por WhatsApp aquí: <a href='https://wa.me/51975513327' target='_blank'><strong>975 513 327</strong></a>";
            } else {
                reply = "Como MakBot, con gusto te ayudo. Para cotizaciones avanzadas o compras personalizadas, escríbenos al WhatsApp directo: <a href='https://wa.me/51975513327' target='_blank'><strong>WhatsApp MAK-PC</strong></a>";
            }
            appendMessage(reply, 'bot');
        }
    </script>

</body>
</html>