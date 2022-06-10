<!DOCTYPE html>
<html>
    <head>
        <title>Paradox - FAQ </title>
        <?php
        session_start();
        if ( $_SESSION['session']  != 1) {
            include_once 'seccion-menu.php';
        }else{
            include_once 'seccion-menu2.php';
        }
        ?>

        <div class="faq">
            <h1>FAQ</h1>
            <details>
            <summary><a>¿Cómo realizar un pedido en línea?</a></summary>
            <p>Desde el menú de nuestra tienda online, puede echar un vistazo a nuestros productos destacados, o seleccionar una categoría específica de producto. Una vez que haya añadido los artículos a su cesta, podrá modificarla y continuar con el pago. Para completar su compra, solo necesita introducir su dirección de entrega y de facturación.</p>
          </details>
          
          <details>
            <summary><a>¿Cuanto cuesta el envío?</a></summary>
            <p>El precio del envío es de 5€. En pedidos superiores a 150€, el envío es gratuito. El IVA ya se incluye en el precio de los productos.</p>
          </details>
            
            <details>
            <summary><a>¿Cuanto tarda el envío?</a></summary>
            <p>El envío puede demorar de 4 a 14 días aproximadamente.</p>
          </details>
            
            <details>
            <summary><a>¿Que métodos de pago admite PARADOX?</a></summary>
            <p>PARADOX por el momento simulamos las compras. Más adelante aceptará los métodos de pago tradicionales, como Visa, Mastercard y PayPal.</p>
          </details>
            <details>
            <summary><a>¿Qué productos de PARADOX puedo comprar en la página web?</a></summary>
            <p>La página web de PARADOX presenta la colección completa zapatos, camisetas, cinturones, gorras, chaquetas, etc.</p>
          </details>
          <details>
            <summary><a>¿Són nuestros productos originales</a></summary>
            <p>Nuestros productos són 100% originales. Nuestros proveedores són los mismos que las primeras marcas actuales, y cada pedido contiene su etiqueta y su información de autenticidad.</p>
          </details>
          <details>
            <summary><a>Información sobre productos y tallas</a></summary>
            <p>Nuestra tienda online ofrece una amplia selección de productos, el catálogo se va actualizando periódicamente con las novedades y productos relevantes.</p>
          </details>
            
          
        </div>
        
        <?php
        include_once 'seccion-footer.php'
        ?>
