document.addEventListener("DOMContentLoaded", function () {
  eventListeners();
  darkMode();

  // AL CARGAR: Si el idioma detectado es español, traduce todo de inmediato
  if (language === "es") {
    updatePageTexts();
  }
});

// Inicialización de la variable con LocalStorage
let language = localStorage.getItem("lang") || "en";

function darkMode() {
  // ... (Tu código de dark mode se queda igual) ...
  const ratherDarkMode = window.matchMedia("prefers-color-scheme: dark");

  if (ratherDarkMode.matches) {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }

  ratherDarkMode.addEventListener("change", function () {
    if (ratherDarkMode.matches) {
      document.body.classList.add("dark-mode");
    } else {
      document.body.classList.remove("dark-mode");
    }
  });

  const buttonDarkMode = document.querySelector(".dark-mode-button");

  buttonDarkMode.addEventListener("click", function () {
    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {
      localStorage.setItem("modo-oscuro", "true");
    } else {
      localStorage.setItem("modo-oscuro", "false");
    }
  });

  if (localStorage.getItem("modo-oscuro") === "true") {
    document.body.classList.add("dark-mode");
  } else {
    document.body.classList.remove("dark-mode");
  }
}

function eventListeners() {
  const mobileMenu = document.querySelector(".mobile-menu");
  // Validación por seguridad
  if (mobileMenu) {
    mobileMenu.addEventListener("click", navegationResponsive);
  }

  const translateButton = document.querySelector(".translate");

  translateButton.addEventListener("click", function () {
    // 1. Lógica de Toggle (Cambio de estado)
    if (language === "en") {
      language = "es";
    } else {
      language = "en";
    }

    // 2. Persistencia (Guardar estado)
    localStorage.setItem("lang", language);

    // 3. Renderizado (Actualizar vista)
    updatePageTexts();
  });
}

function navegationResponsive() {
  const navegation = document.querySelector(".navbar");
  if (navegation.classList.contains("show")) {
    navegation.classList.remove("show");
  } else {
    navegation.classList.add("show");
  }
}

// Nueva función optimizada que unifica los ciclos
function updatePageTexts() {
  const elementsToTranslate = document.querySelectorAll("[data-translate]");

  elementsToTranslate.forEach((element) => {
    const key = element.getAttribute("data-translate");

    // Verificamos que language y la key existan en el diccionario
    if (translations[language] && translations[language][key]) {
      const translation = translations[language][key];

      if (element.tagName === "INPUT" || element.tagName === "TEXTAREA") {
        if (element.hasAttribute("placeholder")) {
          element.placeholder = translation;
        }
        if (element.type === "submit") {
          element.value = translation;
        }
      } else {
        element.textContent = translation;
      }
    }
  });
}

// 1. Objeto con todas las traducciones (Diccionario)
const translations = {
  en: {
    //HEADER Y FOOTER
    "nav-nosotros": "About Us",
    "nav-anuncios": "Announcements",
    "nav-blog": "Blog",
    "nav-contacto": "Contact",
    "nav-cerrar": "Sign Out",
    "header-titulo": "Exclusive Luxury Homes & Apartments for Sale",
    "footer-copyright": "All rights reserved",
    //ABOUT US
    "about-titulo": "Discover More About Us",
    "about-cita": "25 Years of Experience",
    "about-texto":
      "We redefine real estate excellence, connecting extraordinary properties in Mexico and the United States with a select clientele. Our mission is to deliver impeccable, discreet, and personalized guidance, making the search for your ideal home a seamless, borderless experience. Beyond just properties, we curate exclusive lifestyles and secure investment opportunities, backed by deep international market insight and an unwavering passion for detail.",

    "about-mas-nosotros": "More about us",

    // --- ICONOS ---
    "icono-seguridad": "Security",
    "texto-seguridad":
      "We shield your operation with total legal certainty. Our transparent processes protect your assets from any risk.",

    "icono-precio": "Price",
    "texto-precio":
      "Forget about inflated prices. We offer the most competitive costs on the market to ensure maximum real value for your money.",

    "icono-tiempo": "On time",
    "texto-tiempo":
      "We know your time is gold. We guarantee immediate attention and agile management so you don't wait an unnecessary minute.",
    // --- BLOG ---
    "blog-titulo": "Our Blog",
    "blog-meta-fecha": "Written on ", // Dejamos un espacio al final por estética
    "blog-meta-autor": "by: ",

    // Artículo 1
    "blog-entrada1-titulo": "Designing the Perfect Rooftop Terrace",
    "blog-entrada1-texto":
      "Smart tips for building a rooftop terrace with quality materials and a budget-friendly approach.",

    // Artículo 2
    "blog-entrada2-titulo": "A guide to home decoration",
    "blog-entrada2-texto":
      "Smart tips for building a rooftop terrace with quality materials and a budget-friendly approach.",
    // --- CONTACTO ---
    "contacto-titulo": "Contact",
    "contacto-llenar": "Fill out the contact form",
    "contacto-info-personal": "Personal Information",
    "contacto-label-nombre": "Name",
    "contacto-ph-nombre": "Your Name",
    "contacto-label-email": "E-mail",
    "contacto-ph-email": "Your E-mail",
    "contacto-label-tel": "Phone number",
    "contacto-ph-tel": "Your Phone Number",
    "contacto-label-mensaje": "Message",
    "contacto-ph-mensaje": "Your message",

    "contacto-propiedad": "Property Details",
    "contacto-label-opciones": "Buy or Sell",
    "contacto-opcion-select": "-- Select --",
    "contacto-opcion-compra": "Buy",
    "contacto-opcion-venta": "Sell",
    "contacto-label-presupuesto": "Price or Estimate",
    "contacto-ph-presupuesto": "Your Price or Estimate",

    "contacto-contacto": "Contact",
    "contacto-metodo": "Preferred method of contact?",
    "contacto-aviso": "If you choose phone, please select a date and time",
    "contacto-label-fecha": "Date:",
    "contacto-label-hora": "Time:",
    "contacto-boton": "Send",
    // --- INDEX (HOME) ---
    "index-anuncios-titulo": "Houses & Apartments for sale",
    "index-ver-todas": "View All Homes",

    "index-contacto-titulo": "Find your Dream House",
    "index-contacto-texto":
      "Complete the form and one of our advisors will get in touch with you shortly",
    "index-contacto-boton": "Contact Us",

    "index-testimoniales-titulo": "Testimonials",
    "index-testimonial-cita":
      "I had an amazing experience! The team was professional, attentive, and helped me find the perfect home. Highly recommended!",
    //ANNOUNCEMENTS
    "anuncio-boton": "Explore Property",
    "listado-titulo": "Property Listings",
  },
  es: {
    //HEADER Y FOOTER
    "nav-nosotros": "Nosotros",
    "nav-anuncios": "Anuncios",
    "nav-blog": "Blog",
    "nav-contacto": "Contacto",
    "nav-cerrar": "Cerrar Sesión",
    "header-titulo": "Casas y Departamentos de Lujo en Venta",
    "footer-copyright": "Todos los derechos reservados",
    //NOSOTROS
    "about-titulo": "Descubre más sobre nosotros",
    "about-cita": "25 Años de Experiencia",
    "about-texto":
      "Redefinimos el estándar de la excelencia inmobiliaria, conectando propiedades extraordinarias en México y Estados Unidos con clientes selectos. Nuestra misión es brindar una asesoría impecable, discreta y personalizada, transformando la búsqueda de su residencia ideal en una experiencia sin fronteras. Más que metros cuadrados, ofrecemos estilos de vida exclusivos y oportunidades de inversión seguras, respaldadas por un profundo conocimiento del mercado internacional y una pasión por el detalle.", // Tu texto largo en inglés,
    "about-mas-nosotros": "Más sobre nosotros",

    // --- ICONOS (TU TEXTO EN ESPAÑOL) ---
    "icono-seguridad": "Seguridad",
    "texto-seguridad":
      "Blindamos tu operación con total certeza jurídica. Nuestros procesos transparentes protegen tu patrimonio de cualquier riesgo",

    "icono-precio": "Precio",
    "texto-precio":
      "Olvídate de precios inflados. Ofrecemos el costo más competitivo del mercado para asegurar el máximo valor real a tu dinero.",

    "icono-tiempo": "A Tiempo",
    "texto-tiempo":
      "Sabemos que tu tiempo vale oro. Garantizamos atención inmediata y gestión ágil para que no esperes ni un minuto innecesario.",
    // --- BLOG ---
    "blog-titulo": "Nuestro Blog",
    "blog-meta-fecha": "Escrito el: ",
    "blog-meta-autor": "por: ",

    // Artículo 1
    "blog-entrada1-titulo": "Diseñando la Terraza Perfecta",
    "blog-entrada1-texto":
      "Consejos inteligentes para construir una terraza con materiales de calidad y buen precio.",

    // Artículo 2
    "blog-entrada2-titulo": "Guía para la decoración del hogar",
    "blog-entrada2-texto":
      "Maximiza el espacio de tu hogar con esta guía completa de decoración de interiores y colores.",
    // --- CONTACTO ---
    "contacto-titulo": "Contacto",
    "contacto-llenar": "Llene el formulario de contacto",
    "contacto-info-personal": "Información Personal",
    "contacto-label-nombre": "Nombre",
    "contacto-ph-nombre": "Tu Nombre",
    "contacto-label-email": "E-mail",
    "contacto-ph-email": "Tu E-mail",
    "contacto-label-tel": "Teléfono",
    "contacto-ph-tel": "Tu Teléfono",
    "contacto-label-mensaje": "Mensaje",
    "contacto-ph-mensaje": "Tu mensaje",

    "contacto-propiedad": "Información sobre la propiedad",
    "contacto-label-opciones": "Vende o Compra",
    "contacto-opcion-select": "-- Seleccione --",
    "contacto-opcion-compra": "Compra",
    "contacto-opcion-venta": "Vende",
    "contacto-label-presupuesto": "Precio o Presupuesto",
    "contacto-ph-presupuesto": "Tu Precio o Presupuesto",

    "contacto-contacto": "Contacto",
    "contacto-metodo": "¿Cómo desea ser contactado?",
    "contacto-aviso": "Si eligió teléfono, elija la fecha y la hora",
    "contacto-label-fecha": "Fecha:",
    "contacto-label-hora": "Hora:",
    "contacto-boton": "Enviar",
    // --- INDEX (HOME) ---
    "index-anuncios-titulo": "Casas y Depas en Venta",
    "index-ver-todas": "Ver Todas",

    "index-contacto-titulo": "Encuentra la casa de tus sueños",
    "index-contacto-texto":
      "Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad",
    "index-contacto-boton": "Contáctanos",

    "index-testimoniales-titulo": "Testimoniales",
    "index-testimonial-cita":
      "¡Tuve una experiencia increíble! El equipo fue muy profesional, atento y me ayudaron a encontrar la casa perfecta. ¡Altamente recomendados!",
    //Anuncios propiedades
    "anuncio-boton": "Ver Propiedad",
    "listado-titulo": "Lista de propiedades",
  },
};

// Variable para saber el idioma actual

function changeLanguage() {
  // 1. Alternar el idioma
  if (language === "en") {
    language = "es";
  } else {
    language = "en";
  }

  // 2. Seleccionar todos los elementos que tengan el atributo data-translate
  const elementsToTranslate = document.querySelectorAll("[data-translate]");

  // 3. Recorrerlos y cambiar el texto
  elementsToTranslate.forEach((element) => {
    const key = element.getAttribute("data-translate"); // ej: "nav-nosotros"

    // Verificar si existe la traducción para evitar errores
    if (translations[language][key]) {
      element.textContent = translations[language][key];
    }
  });

  // ... dentro de la función changeLanguage ...

  elementsToTranslate.forEach((element) => {
    const key = element.getAttribute("data-translate");
    const translation = translations[language][key];

    if (translation) {
      // CASO 1: Es un Input, Textarea o Botón
      if (element.tagName === "INPUT" || element.tagName === "TEXTAREA") {
        // Si tiene placeholder, lo cambiamos
        if (element.hasAttribute("placeholder")) {
          element.placeholder = translation;
        }

        // Si es un botón submit, cambiamos el value
        if (element.type === "submit") {
          element.value = translation;
        }
      } else {
        // CASO 2: Es texto normal (h1, p, label, option, etc.)
        element.textContent = translation;
      }
    }
  });
}
