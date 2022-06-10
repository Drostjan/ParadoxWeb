<!DOCTYPE html>
<html>

<head>
    <title>Paradox - Acerca de Nosotros </title>
    <?php 
session_start();
if ( $_SESSION['session']  != 1) {
    include_once 'seccion-menu.php';
}else{
    include_once 'seccion-menu2.php';
}
    ?>
<div class="main-2">
    <div class="about">
    <h1>Aplicación web (PARADOX)</h1>
        <div class="about-resumen">
            <h2>Detalles del proyecto</h2> 
                <p> <a>INTEGRANTES:</a> <br>
                Joel Ruiz / 
                Audrick Eleccion / 
                Andrés Rosales </p>
                <p> <a>HORAS:</a> 792h (264h c/u) </p>
            <h2>Resumen del proyecto</h2> 
            <p>
                Desarrollar una tienda online (página web). Esta consistirá en vender diferentes tipos de prendas como camisetas, zapatos y otras más. 
                Trabajaremos tanto el aspecto gráfico como el funcional de la página web. Los usuarios que la visiten tendrán la oportunidad de hacerse 
                su propia cuenta y hacer compras. Toda información relevante será guardada en la base de datos, así como la información del usuario y 
                de los productos. Se hará lo posible para mantenerlo en pie contra los ataques cibernéticos.
            </p>
        </div>
        <div class="about-descripción">
            <h2>Descripcion del proyecto</h2>
            <p>
            El sitio web tendrá una página principal, dónde mostrará los productos más relevantes de la propia tienda. La necesidad primordial a cubrir es la vestimenta, y el calzado.<br>
            A parte de la principal, a su vez habrá las siguientes secciones: Moda, calzado y accesorios que serán las categorías de los productos a vender, que se abrirán cada una con un menú de tipo toolbar en la parte superior de la página<br>
            En cada categoría de la página habrá una búsqueda interactiva para elegir el producto que el cliente desea comprar, tendrá filtro de búsqueda la cual facilitará la navegación.<br>
            En la parte de los productos estará el precio y el nombre del producto, al clicar irá a la página de cada producto donde habrá información sobre este.<br>
            Los clientes podrán registrarse para hacer las compras, con su propia cesta, calculando el precio total de los artículos agregados anteriormente.<br>
            Mientras se vaya diseñando, se irán probando diferentes resoluciones para que se adapte a ellas y tengan una presentación aceptable (será “responsive”).<br>
            Probaremos la página y solucionaremos los fallos de seguridad que vayamos encontrando, para que esta sea segura. A su vez haremos testeos de seguridad cvss para ver que posibles vulnerabilidades tendría nuestra página.<br>
            </p>
            <h2>Desarrollo del proyecto</h2>
            <p>
            Fase 1: Esquematización y/o planificación del diseño de la página web de manera detallada y modular. 
            Fase 2: Se planifican cada uno de los módulos que tendrá la página web.
            Fase 3: Se desarrolla la página web, los diversos módulos y la documentación/desc
            Fase 4: Se desarrollará la parte visual y dinámica de la web (que la página web s
            Fase 5:  Se realizan pruebas para comprobar la seguridad. Si es necesario se vuel
            Fase 6: Test Final de seguridad y funcionamiento total de la página.
            </p>
        </div>
    </div>
</div>
    <?php
            include_once 'seccion-footer.php'
        ?>
