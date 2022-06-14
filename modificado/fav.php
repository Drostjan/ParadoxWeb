<!DOCTYPE html>
<html>

<head>
    <title>Paradox - Favoritos </title>
    <?php
        session_start();
        if ( $_SESSION['session']  != 1) {
            include_once 'seccion-menu.php';
            include_once 'not_logged.php';
        }else{
            include_once 'seccion-menu2.php';
           
        
?>
    <div class="main-2">
        <div class="paradox_separator2">
            <a>FAVORITOS</a>
        </div>
        <div class="caja_cesta_fav">
            <ul>
                <li>
                    <?php
                        if(!isset($_SESSION['favs'])){
                            ?>
                        <h3>En este momento su lista de favoritos esta vacía</h3>
                        <?php
                        }else{
                        $favs=$_SESSION['favs'];
                        $_SESSION['favs']=$favs;
		            	if(isset($_SESSION['favs'])){
		            	    $total=0;
                            $qty=0;
                            foreach ($favs as $key => $value) {
		            		    if($favs[$key]!=NULL ){   
                    ?>

                    <div class="producto_fav">
                        <?php echo "<a href='producto.php?id=".$favs[$key]['name']."'><img src='".$favs[$key]['imagen']."' ></a>" ?>
                    </div>
                    <p class="item-title">
                        Producto:
                        <?php echo $favs[$key]['name']."  "; ?>
                    </p>
                    
                    <a href="includes/borrarFavsP.inc.php?id=<?php echo $key; ?>"><button
                            type="button">Eliminar</button></a>
                
                </li>
                <?php
		    
                }
            }
        }
        }
        ?>
        <div class="buttonsCestaFav">
        <p><a href="includes/borrarFavs.inc.php"><button type="button">Vaciar favoritos</button></a></p>
        </div> 
            </ul>
            

        </div>
    </div>
    <?php
        }
    include_once 'seccion-footer.php'
?>