<!DOCTYPE html>
<link rel="stylesheet" href="styles.css">
<style>
    #hero .hero-content {
        background-color: rgba(255, 255, 255, 0.7);
        padding: 20px;
    }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
        }
        
        h1 {
            margin: 0;
            font-size: 32px;
        }
        
        #hero {
            background-image: url('uploads/banner/store-banner.svg');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;

        }
        
        #hero h2 {
            font-size: 48px;
            margin-bottom: 20px;
            /* Add text shadow */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        #hero p {
            font-size: 24px;
            margin-bottom: 20px;
            /* Add text shadow */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        
        #featured-products {
            background-color: #f5f5f5;
            padding: 40px;
        }
        
        #featured-products h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }
        
        .product-list {
            display: flex;
            justify-content: space-between;
        }
        
        .product-list .product {
            width: 30%;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        #services {
            padding: 40px;
        }
        
        #services h2 {
                font-size: 32px;
                margin-bottom: 20px;
            }
            
            #services ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
            
            #services ul li {
                margin-bottom: 10px;
            }
            
            #contact {
                background-color: #333;
                color: #fff;
                padding: 40px;
            }
            
            #contact h2 {
                font-size: 32px;
                margin-bottom: 20px;
            }
            
            #contact p {
                font-size: 24px;
                margin-bottom: 20px;
            }
            
            #contact a {
                color: #fff;
                text-decoration: none;
            }
            
            footer {
                background-color: #333;
                color: #fff;
                padding: 20px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <header>
            <h1>Bienvenido a DotServices</h1>
        </header>
    
    <section id="hero">
        <div class="hero-content">
            <h2>Encuentra confianza en cada producto</h2>
            <p>Encuentra los productos que puedas necesitar para tu equipo y tu hogar o negocio.</p>
            <a href="#" class="btn">Comprar ahora</a>
        </div>
    </section>
    
    <section id="featured-products">
        <h2>Featured Products</h2>
        <div class="product-list">
            <!-- Display featured products here -->
        </div>
    </section>
    
    <section id="services">
        <h2>Nuestros Servicios</h2>
        <ul>
            <li>Reparación de ordenadores</li>
            <li>Instalación de software</li>
            <li>Construcción de PC a medida</li>
            <li>Soluciones de redes</li>
            <li>Diseño de Webs</li>
        </ul>
    </section>
    
    <section id="contact">
        <h2>Contact Us</h2>
        <p>Feel free to reach out to us for any inquiries or assistance.</p>
        <a href="mailto:info@computerstore.com">info@computerstore.com</a>
    </section>
    
    <footer>
        <p>&copy; <?php echo date("Y"); ?> DotServices. All rights reserved.</p>
    </footer>
    </main>
