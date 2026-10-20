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

    <!-- Sección de Productos -->
    <section id="productos" class="products">
        <div class="container">
            <h2 class="section-title">Productos Destacados</h2>
            <p class="section-subtitle">Encuentra los mejores componentes para potenciar tu equipo</p>

            <div class="product-grid">
                
                <!-- PRODUCTOS ANTERIORES -->
                
                <!-- Memoria RAM Fury Beast -->
                <div class="product-card">
                    <div class="card-img">
                        <img src="img/ram-fury.jpg" alt="Memoria RAM Kingston Fury Beast">
                    </div>
                    <div class="card-body">
                        <span class="category">Memorias RAM</span>
                        <h3>Kingston Fury Beast DDR4 16GB</h3>
                        <p>Memoria de alto rendimiento a 3200MHz con disipador de calor de perfil bajo, ideal para gaming y edición.</p>
                        <div class="card-footer">
                            <span class="price">S/ 185.00</span>
                            <a href="#contacto" class="btn-sm">Consultar</a>
                        </div>
                    </div>
                </div>

                <!-- SSD Kingston NV2 -->
                <div class="product-card">
                    <div class="card-img">
                        <img src="img/ssd-kingston.jpg" alt="SSD Kingston NV2 1TB">
                    </div>
                    <div class="card-body">
                        <span class="category">Almacenamiento</span>
                        <h3>SSD Kingston NV2 1TB PCIe 4.0 NVMe</h3>
                        <p>Velocidad de lectura de hasta 3500 MB/s. Incrementa la velocidad de arranque de tu sistema y aplicaciones.</p>
                        <div class="card-footer">
                            <span class="price">S/ 245.00</span>
                            <a href="#contacto" class="btn-sm">Consultar</a>
                        </div>
                    </div>
                </div>

                <!-- Teclado Mecánico Redragon -->
                <div class="product-card">
                    <div class="card-img">
                        <img src="img/teclado-redragon.jpg" alt="Teclado Mecánico Redragon Kumara">
                    </div>
                    <div class="card-body">
                        <span class="category">Periféricos Gamer</span>
                        <h3>Teclado Mecánico Redragon Kumara K552</h3>
                        <p>Switches Red mecánicos, retroiluminación RGB configurable y diseño compacto TKL duradero.</p>
                        <div class="card-footer">
                            <span class="price">S/ 160.00</span>
                            <a href="#contacto" class="btn-sm">Consultar</a>
                        </div>
                    </div>
                </div>

                <!-- Mouse Logitech G203 -->
                <div class="product-card">
                    <div class="card-img">
                        <img src="img/mouse-logitech.jpg" alt="Mouse Logitech G203 Lightsync">
                    </div>
                    <div class="card-body">
                        <span class="category">Periféricos Gamer</span>
                        <h3>Mouse Logitech G203 Lightsync RGB</h3>
                        <p>Sensor de 8000 DPI con precisión de grado competitivo e iluminación Lightsync asignable.</p>
                        <div class="card-footer">
                            <span class="price"> S/ 95.00</span>
                            <a href="#contacto" class="btn-sm">Consultar</a>
                        </div>
                    </div>
                </div>

                <!-- PRODUCTOS NUEVOS -->

                <!-- Combo Teclado y Mouse Acer -->
                <div class="product-card">
                    <div class="card-img">
                        <img src="img/acer-combo.jpg" alt="Combo Teclado y Mouse Acer EAK040">
                    </div>
                    <div class="card-body">
                        <span class="category">Periféricos</span>
                        <h3>Combo Teclado & Mouse Acer EAK040</h3>
                        <p>Combo alámbrico ideal para oficina y uso diario, brindando durabilidad y escritura cómoda.</p>
                        <div class="card-footer">
                            <span class="price">S/ 70.00</span>
                            <a href="#contacto" class="btn-sm">Consultar</a>
                        </div>
                    </div>
                </div>

                <!-- Mouse Gaming T-WOLF V15 -->
                <div class="product-card">
                    <div class="card-img">
                        <img src="img/mouse-wolf.jpg" alt="Mouse Gaming T-WOLF V15">
                    </div>
                    <div class="card-body">
                        <span class="category">Periféricos Gamer</span>
                        <h3>Mouse Gaming T-WOLF V15 Beehive</h3>
                        <p>Diseño ultra ligero en panal de abeja, retroiluminación RGB y respuesta rápida para gaming.</p>
                        <div class="card-footer">
                            <span class="price">S/ 25.00</span>
                            <a href="#contacto" class="btn-sm">Consultar</a>
                        </div>
                    </div>
                </div>

                <!-- Fuente de Poder Halion 600W -->
                <div class="product-card">
                    <div class="card-img">
                        <img src="img/fuente-halion.jpg" alt="Fuente de Poder Halion Micro ATX-600W">
                    </div>
                    <div class="card-body">
                        <span class="category">Componentes</span>
                        <h3>Fuente Halion Micro ATX-600W P8</h3>
                        <p>Fuente de alimentación estándar ATX 12V v2.0 para chasís compactos y de escritorio.</p>
                        <div class="card-footer">
                            <span class="price">S/ 75.00</span>
                            <a href="#contacto" class="btn-sm">Consultar</a>
                        </div>
                    </div>
                </div>

                <!-- Adaptador Mini DisplayPort -->
                <div class="product-card">
                    <div class="card-img">
                        <img src="img/adaptador-dp.jpg" alt="Adaptador Mini DisplayPort">
                    </div>
                    <div class="card-body">
                        <span class="category">Accesorios & Cables</span>
                        <h3>Adaptador Mini DisplayPort Genérico</h3>
                        <p>Convertidor de señal de video Mini DP a salida estándar para monitores o proyectores.</p>
                        <div class="card-footer">
                            <span class="price">S/ 40.00</span>
                            <a href="#contacto" class="btn-sm">Consultar</a>
                        </div>
                    </div>
                </div>

                <!-- Impresora Térmica POS-D -->
                <div class="product-card">
                    <div class="card-img">
                        <img src="img/impresora-pos.jpg" alt="Impresora Térmica POS-D PT-280">
                    </div>
                    <div class="card-body">
                        <span class="category">Equipos POS</span>
                        <h3>Impresora Térmica POS-D PT-280</h3>
                        <p>Impresora directa de recibos térmicos ideal para sistemas de facturación y Puntos de Venta.</p>
                        <div class="card-footer">
                            <span class="price">Consultar</span>
                            <a href="#contacto" class="btn-sm">Consultar</a>
                        </div>
                    </div>
                </div>

                <!-- Cable de Red -->
                <div class="product-card">
                    <div class="card-img">
                        <img src="img/cable-red.jpg" alt="Cable de Red RJ45">
                    </div>
                    <div class="card-body">
                        <span class="category">Conectividad</span>
                        <h3>Cable de Red Ethernet RJ45</h3>
                        <p>Cable de red de alta velocidad para conexiones estables a internet en PC o consolas.</p>
                        <div class="card-footer">
                            <span class="price">Consultar</span>
                            <a href="#contacto" class="btn-sm">Consultar</a>
                        </div>
                    </div>
                </div>

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

    <!-- JavaScript -->
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