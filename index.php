<?php require_once('config.php'); ?>
 <!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>
  <body>

   <!-- Header
   ================================================== -->
   <header id="home">

      <nav id="nav-wrap">

         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Navegación</a>
        <a class="mobile-btn" href="#" title="Hide navigation">Ver navegación</a>

         <ul id="nav" class="nav">
            <li class="current"><a class="smoothscroll" href="#home">Inicio</a></li>
            <li><a class="smoothscroll" href="#about">Sobre mí</a></li>
           <li><a class="smoothscroll" href="#resume">Educación</a></li>
            <li><a class="smoothscroll" href="#portfolio">Experiencia</a></li>
            <li><a class="smoothscroll" href="#testimonials">Proyectos</a></li>
            <li><a class="smoothscroll" href="#contact">Contacto</a></li>
         </ul> <!-- end #nav -->

      </nav> <!-- end #nav-wrap -->
<?php 
$u_qry = $conn->query("SELECT * FROM users where id = 1");
foreach($u_qry->fetch_array() as $k => $v){
  if(!is_numeric($k)){
    $user[$k] = $v;
  }
}
$c_qry = $conn->query("SELECT * FROM contacts");
while($row = $c_qry->fetch_assoc()){
    $contact[$row['meta_field']] = $row['meta_value'];
}
// var_dump($contact['facebook']);
?>
      <div class="row banner">
         <div class="banner-text">
            <h1 class="responsive-headline"> <?php echo isset($user) ? ucwords($user['firstname'].' '.$user['lastname']) : ""; ?></h1>
            <h3><?php echo stripslashes($_settings->info('welcome_message')) ?></h3>
            <hr />
            <ul class="social">
               <!-- <li><a target="_blank" href="<?php // echo $contact['facebook'] ?>"><i class="fa fa-facebook"></i></a></li> -->
               <!-- <li><a target="_blank" href="<?php // echo $contact['twitter'] ?>"><i class="fa fa-twitter"></i></a></li> -->
               <li><a target="_blank" href="mailto:<?php echo $contact['email'] ?>"><i class="fa fa-envelope" aria-hidden="true"></i></i></a></li>
               <li><a target="_blank" href="<?php echo $contact['linkin'] ?>"><i class="fa fa-linkedin"></i></a></li>
            </ul>
         </div>
      </div>

      <p class="scrolldown">
         <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
      </p>

   </header> <!-- Header End -->


   <!-- About Section
   ================================================== -->
   <section id="about">

      <div class="row">

         <div class="three columns">

            <img class="profile-pic" src="./uploads/foto-cv.jpg" alt="">

         </div>

         <div class="nine columns main-col">

            <h2>Sobre mí</h2>
            <style>
              #about_me *{
                color:#7A7A7A !important;
              }
            </style>
            <div id="about_me"><?php include "about.html"; ?></div>

            <div class="row">

               <div class="columns contact-details">

                  <h2>Contacto</h2>
                  <p class="address">
               <!-- <span><?php // echo $contact['address'] ?></span><br>
               <span><?php // echo $contact['mobile'] ?></span><br> -->
                     <span><?php echo $contact['email'] ?></span>
             </p>

               </div>

               <div class="columns download">
                  <p>
                     <a href="./uploads/CV-Roberto-Miranda-2023-php2.pdf" download  class="button"><i class="fa fa-download"></i>Descargar C.V.</a>
                  </p>
               </div>

            </div> <!-- end row -->

         </div> <!-- end .main-col -->

      </div>

   </section> <!-- About Section End-->


   <!-- Resume Section
   ================================================== -->
   <section id="resume">

      <!-- Education
      ----------------------------------------------- -->
      <div class="row education">

         <div class="three columns header-col">
            <h1><span>Educación</span></h1>
         </div>

         <div class="nine columns main-col">
          <?php 
          $e_qry = $conn->query("SELECT * FROM education order by year desc, month desc");
          while($row = $e_qry->fetch_assoc()):
          ?>
            <div class="row item">

               <div class="twelve columns">

                  <h3><?php echo $row['school'] ?></h3>
                  <p class="info"><?php echo $row['degree'] ?> <span>&bull;</span> <em class="date"><?php echo $row['month'].' '.$row['year'] ?></em></p>

                  <p>
                  <?php echo stripslashes(html_entity_decode($row['description'])) ?>
                  </p>

               </div>

            </div> <!-- item end -->
          <?php endwhile; ?>
           

         </div> <!-- main-col end -->

      </div> <!-- End Education -->


      <!-- Work
      ----------------------------------------------- -->
      <div class="row work">

         <div class="three columns header-col">
            <h1><span>Experiencia</span></h1>
         </div>

         <div class="nine columns main-col">
          <?php 
          $w_qry = $conn->query("SELECT * FROM work ");
          while($row = $w_qry->fetch_assoc()):
          ?>
            <div class="row item">

               <div class="twelve columns">

                  <h3><?php echo $row['company'] ?></h3>
                  <p class="info"><?php echo $row['position'] ?> <span>&bull;</span> <em class="date"><?php echo str_replace("_"," ",$row['started']) ?> - <?php echo str_replace("_"," ",$row['ended']) ?></em></p>

                  
                  <p><?php echo stripslashes(html_entity_decode($row['description'])) ?></p>

               </div>

            </div> <!-- item end -->
          <?php endwhile; ?>
         </div> <!-- main-col end -->

      </div> <!-- End Work -->


      <!-- Skills --> 

      <div class="row skill">

         <div class="three columns header-col">
            <h1><span>Skills</span></h1>
         </div>

         <div class="nine columns main-col">
          
            <div class="row item">
               <div class="twelve columns">
               <div class="row">
        <!-- Habilidad 1 -->
        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <h5 class="mb-0">NodeJS</h5>
            <img src="./uploads/nodejs.png" alt="HTML Logo" class="img-fluid mr-3" style="max-width: 80px;">
          </div>
        </div>
        <!-- linea separadora no usar hr -->
         <div class="col-md-12 mb-4">
            <hr>
         </div>
        <!-- Habilidad 2 -->
        <div class="col-md-6 mb-4">
          <div class="d-flex align-items-center">
            <h5 class="mb-0">WordPress</h5>
            <img src="./uploads/wordpress.png" alt="CSS Logo" class="img-fluid mr-3" style="max-width: 50px;">
          </div>
        </div>
        <div class="col-md-12 mb-4">
            <hr>
         </div>
        <!-- Habilidad 3 -->
        <div class="col-md-6 mb-4">
         <h5 class="mb-0">PHP</h5>
          <div class="d-flex align-items-center">
            <img src="./uploads/php.png" alt="JavaScript Logo" class="img-fluid mr-3" style="max-width: 80px;">
          </div>
        </div>
        <div class="col-md-12 mb-4">
            <hr>
         </div>
        <!-- Habilidad 4 -->
        <div class="col-md-6 mb-4">
           <div class="d-flex align-items-center">
            <h5 class="mb-0">MySql</h5>
            <img src="./uploads/mysql.png" alt="Bootstrap Logo" class="img-fluid mr-3" style="max-width: 80px;">
          </div>
        </div>
        <div class="col-md-12 mb-4">
            <hr>
         </div>
               </div>
            </div>
         
         </div> <!-- main-col end -->

   </section>


   <!-- Portfolio Section
   ================================================== -->
   <section id="testimonials">

      <div class="row">

         <div class="twelve columns collapsed">
            <!-- h1 proyectos, agrega estilo bootstrap para que quede centrado -->
            <h1 class="text-center">Proyectos</h1>

            <!-- portfolio-wrapper -->
            <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">
               <?php 
                  $p_qry = $conn->query("SELECT * FROM project ");
                  while($row = $p_qry->fetch_assoc()):
                  ?>
                 <div class="columns portfolio-item">
                    <div class="item-wrap">

                       <a href="#modal-<?php echo $row['id'] ?>" title="">
                          <img alt="" src="<?php echo validate_image($row['banner']) ?>">
                          <div class="overlay">
                             <div class="portfolio-item-meta">
                            <h5 class="truncate-1"><?php echo $row['name'] ?></h5>
                                <!-- <p>Illustrration</p> -->
                         </div>
                          </div>
                          <div class="link-icon"><i class="icon-plus"></i></div>
                       </a>
                    </div>
                </div> <!-- item end -->

              <?php endwhile; ?>

            </div> <!-- portfolio-wrapper end -->

         </div> <!-- twelve columns end -->


          <?php 
              $p_qry = $conn->query("SELECT * FROM project ");
              while($row = $p_qry->fetch_assoc()):
            ?>

         <!-- Modal Popup
        --------------------------------------------------------------- -->

         <div id="modal-<?php echo $row['id'] ?>" class="popup-modal mfp-hide">

          <img class="scale-with-grid" src="<?php echo validate_image($row['banner']) ?>" alt="" />

          <div class="description-box">
            <h4><?php echo $row['name'] ?></h4>
            <p><?php echo stripslashes(html_entity_decode($row['description'])) ?></p>
               <span class="categories"><i class="fa fa-tag"></i><?php echo $row['client'] ?></span>
          </div>

            <div class="link-box">
               <!-- <a href="http://srikrishnacommunication.com/Giridesigns.html" target="_blank">Details</a> -->
             <a class="popup-modal-dismiss">Cerrar</a>
            </div>

        </div><!-- modal-01 End -->

      <?php endwhile; ?>


      </div> <!-- row End -->

   </section> <!-- Portfolio Section End-->






   </section> <!-- Testimonials Section End-->

   <!-- Contact form -->

   <section id="contact">

      <div class="row section-head">

         <div class="two columns header-col">

            <h1><span>Contacto</span></h1>

         </div>

         <div class="ten columns">

               <p class="lead">Podés contactarme a través de mi mail, linkedin o desde el siguiente formulario.
               </p>

         </div>

      </div>

      <div class="row">
         <div class="eight columns">

            <!-- form -->
            <form action="" method="post" id="contactForm" name="contactForm">
               <fieldset>

                  <div>
                     <label for="contactName">Nombre <span class="required">*</span></label>
                     <input type="text" value="" size="35" id="contactName" name="contactName">
                  </div>

                  <div>
                     <label for="contactEmail">Correo electrónico <span class="required">*</span></label>
                     <input type="text" value="" size="35" id="contactEmail" name="contactEmail">
                  </div>

                  <div>
                     <label for="contactSubject">Asunto</label>
                     <input type="text" value="" size="35" id="contactSubject" name="contactSubject">
                  </div>

                  <div>
                     <label for="contactMessage">Mensaje <span class="required">*</span></label>
                     <textarea cols="50" rows="15" id="contactMessage" name="contactMessage"></textarea>
                  </div>

                  <div>
                     <button class="submit">Enviar</button>
                     <span id="image-loader">
                        <img alt="" src="images/loader.gif">
                     </span>
                  </div>

               </fieldset>
            </form> <!-- Form End -->

            <!-- contact-warning -->
            <div id="message-warning"> Error</div>
            <!-- contact-success -->
            <div id="message-success">
               <i class="fa fa-check"></i>Tu mensaje fue enviado, gracias!<br>
            </div>

         </div>

               </section>




  
      <!-- /.content-wrapper -->
      <?php require_once('inc/footer.php') ?>
  </body>
</html>
