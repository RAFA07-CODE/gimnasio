<?php
include __DIR__ . '/admin/tienda.class.php';
include __DIR__ . '/admin/marca.class.php';
include __DIR__ . '/header.php';
$webTiendas = new Tienda();
$webMarcas = new Marca();
$tiendas = array();
$tiendas = $webTiendas->getAll();
$marcas = array();
$marcas = $webMarcas->getAll();
?>

    <!-- HERO -->
    <section class="hero d-flex flex-column justify-content-center align-items-center" id="home">

        <div class="bg-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-10 mx-auto col-12">
                    <div class="hero-text mt-5 text-center">

                        <h6 data-aos="fade-up" data-aos-delay="300">Una nueva forma de cambiar tu vida!</h6>

                        <h1 class="text-white" data-aos="fade-up" data-aos-delay="500">Supera tus capacidades con
                            MUSKULOS OLYMPUS</h1>

                        <a href="#feature" class="btn custom-btn mt-3" data-aos="fade-up"
                            data-aos-delay="600">Comenzar</a>

                        <a href="#about" class="btn custom-btn bordered mt-3" data-aos="fade-up"
                            data-aos-delay="700">leer más</a>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="feature" id="feature">
        <div class="container">
            <div class="row">

                <div class="d-flex flex-column justify-content-center ml-lg-auto mr-lg-5 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-3 text-white" data-aos="fade-up">¿Eres nuevo en el gimnasio?</h2>

                    <h6 class="mb-4 text-white" data-aos="fade-up">Tu membresía incluye hasta 2 meses GRATIS ($62.50 por mes).</h6>

                    <p data-aos="fade-up" data-aos-delay="200">Al obtener una membresía en nuestro gimnasio, tendrás acceso completo a nuestras instalaciones de alta calidad, 
                        equipos de última generación y clases dirigidas por expertos. Además, te ofrecemos asesoramiento personalizado para ayudarte a alcanzar tus objetivos 
                        de fitness de manera efectiva y segura. No pierdas la oportunidad de mejorar tu salud y bienestar con nosotros. ¡Únete hoy mismo!
                    </p>

                    <a href="register.php" class="btn custom-btn bg-color mt-3" data-aos="fade-up" data-aos-delay="300">Conviértete en miembro ahora</a>
                </div>

                <div class="mr-lg-auto mt-3 col-lg-4 col-md-6 col-12">
                    <div class="about-working-hours">
                        <div>

                            <h2 class="mb-4 text-white" data-aos="fade-up" data-aos-delay="500">Horarios de Atención</h2>

                            <strong class="d-block" data-aos="fade-up" data-aos-delay="600">Domingo : Cerrado</strong>

                            <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Lunes -
                                Viernes</strong>

                            <p data-aos="fade-up" data-aos-delay="800">7:00 AM - 10:00 PM</p>

                            <strong class="mt-3 d-block" data-aos="fade-up" data-aos-delay="700">Sabado</strong>

                            <p data-aos="fade-up" data-aos-delay="800">6:00 AM - 4:00 PM</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>


    <!-- ABOUT -->
    <section class="about section" id="about">
        <div class="container">
            <div class="row">

                <div class="mt-lg-5 mb-lg-0 mb-4 col-lg-5 col-md-10 mx-auto col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="300">Hola, somos MUSKULOS OLYMPUS</h2>

                    <p data-aos="fade-up" data-aos-delay="400">¡Únete a nosotros en Musculos Olympus y descubre 
                        tu mejor versión! Te invitamos a visitar nuestro gimnasio para disfrutar de instalaciones 
                        de primera, equipos modernos y clases dirigidas por expertos. ¡Empieza tu viaje hacia una 
                        vida más saludable y activa con nosotros hoy mismo!</p>
                </div>

                <div class="ml-lg-auto col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="700">
                    <div class="team-thumb">
                        <img src="images/team/team-image.jpg" class="img-fluid" alt="Trainer">

                        <div class="team-info d-flex flex-column">

                            <h3>Rebeca L.</h3>
                            <span>Coach de Yoga</span>

                            <ul class="social-icon mt-3">
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-instagram"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mr-lg-auto mt-5 mt-lg-0 mt-md-0 col-lg-3 col-md-6 col-12" data-aos="fade-up"
                    data-aos-delay="800">
                    <div class="team-thumb">
                        <img src="images/team/team-image01.jpg" class="img-fluid" alt="Trainer">

                        <div class="team-info d-flex flex-column">

                            <h3>Samanta V.</h3>
                            <span>Coach de cardio</span>

                            <ul class="social-icon mt-3">
                                <li><a href="#" class="fa fa-instagram"></a></li>
                                <li><a href="#" class="fa fa-facebook"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- CLASS -->
    <section class="class section" id="class">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12 text-center mb-5">
                    <h6 data-aos="fade-up">Entrena con nosotros</h6>

                    <h2 data-aos="fade-up" data-aos-delay="200">Unete a nuestras clases</h2>
                </div>

                <div class="col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="400">
                    <div class="class-thumb">
                        <img src="images/class/yoga.jpg" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Yoga</h3>

                            <span><strong>Dada por</strong> - Isabel</span>

                            <span class="class-price">$300</span>

                            <p class="mt-3">Una clase de yoga se enfoca en posturas físicas (asanas), técnicas de respiración 
                                y meditación para mejorar la fuerza, flexibilidad y equilibrio del cuerpo, mientras se promueve 
                                la relajación y la atención plena. Ayuda a mejorar la salud física y mental, y a encontrar paz interior.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-5 mt-lg-0 mt-md-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">
                    <div class="class-thumb">
                        <img src="images/class/aero.jpg" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Areobicos</h3>

                            <span><strong>Dada por</strong> - Mary</span>

                            <span class="class-price">$150</span>

                            <p class="mt-3">Una clase de aeróbicos consiste en ejercicios dinámicos 
                                y enérgicos que incluyen movimientos de baile y saltos para mejorar
                                la resistencia cardiovascular, la coordinación y quemar calorías. 
                                Es divertida y efectiva para mejorar la condición física y mantener 
                                un peso saludable</p>
                        </div>
                    </div>
                </div>

                <div class="mt-5 mt-lg-0 col-lg-4 col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
                    <div class="class-thumb">
                        <img src="images/class/cardio.jpg" class="img-fluid" alt="Class">

                        <div class="class-info">
                            <h3 class="mb-1">Cardio</h3>

                            <span><strong>Dada por</strong> - Sofia</span>

                            <span class="class-price">$200</span>

                            <p class="mt-3">Una clase de cardio se enfoca en ejercicios que elevan
                                 el ritmo cardíaco para mejorar la salud cardiovascular y quemar calorías. 
                                 Incluye movimientos como correr, saltar, hacer jumping jacks y otros ejercicios 
                                 aeróbicos. El objetivo es aumentar la resistencia y fortalecer el corazón y los 
                                 pulmones</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- SCHEDULE -->
    <section class="schedule section" id="schedule">
    <div class="container">
    <h2 style="padding-bottom: 20px; color: white;">Conoce a nuestros patrocinadores</h2>
        <div class="row py-7">
            <?php foreach ($marcas as $marca) : ?>
                <div class="col-2">
                    <div class="card mb-3 px-2 py-2">
                        <img src="uploads/marcas/<?php echo $marca['fotografia']; ?>" alt="<?php echo $marca['marca']; ?>" class="card-img-top img-fluid">
                        <div class="card-body">
                            <p style="font-size: 18px;" class="card-title" class="card-title"><?php echo $marca['marca']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </section>


    <!-- CONTACT -->
    <section class="contact section" id="contact">
        <div class="container">
            <div class="row">

                <div class="ml-auto col-lg-5 col-md-6 col-12">
                    <h2 class="mb-4 pb-2" data-aos="fade-up" data-aos-delay="200">Pregunta sin compromiso</h2>

                    <form action="#" method="post" class="contact-form webform" data-aos="fade-up" data-aos-delay="400"
                        role="form">
                        <input type="text" class="form-control" name="cf-name" placeholder="Nombre">

                        <input type="email" class="form-control" name="cf-email" placeholder="Correo">

                        <textarea class="form-control" rows="5" name="cf-message" placeholder="Comentario"></textarea>

                        <button type="submit" class="form-control" id="submit-button" name="submit">Enviar comentario</button>
                    </form>
                </div>

                <div class="mx-auto mt-4 mt-lg-0 mt-md-0 col-lg-5 col-md-6 col-12">
                    <h2 class="mb-4" data-aos="fade-up" data-aos-delay="600">Donde nos <span>encontramos</span></h2>

                    <p data-aos="fade-up" data-aos-delay="800"><i class="fa fa-map-marker mr-1"></i> #125 Juárez, Celaya, Guanajuato, México</p>
                    <div class="google-map" data-aos="fade-up" data-aos-delay="900">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3736.704543701686!2d-100.81817222403211!3d20.518334705112604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cba89988ae617%3A0xd41822a4dd5a33e8!2sBenito%20Ju%C3%A1rez%20125%2C%20Col.%20Centro%2C%2038000%20Celaya%2C%20Gto.!5e0!3m2!1ses-419!2smx!4v1712374243514!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>    
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">

                <div class="ml-auto col-lg-4 col-md-5">
                </div>

                <div class="d-flex justify-content-center mx-auto col-lg-5 col-md-7 col-12">
                    <p class="mr-4">
                        <i class="fa fa-envelope-o mr-1"></i>
                        <a href="admin/login.php">login</a>
                    </p>

                    <p><i class="fa fa-phone mr-1"></i> 411-157-0331</p>
                </div>

            </div>
        </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="membershipForm" tabindex="-1" role="dialog" aria-labelledby="membershipFormLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">

            <div class="modal-content">
                <div class="modal-header">

                    <h2 class="modal-title" id="membershipFormLabel">Membresía</h2>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form class="membership-form webform" role="form">
                        <input type="text" class="form-control" name="cf-name" placeholder="Roberto Carlos">

                        <input type="email" class="form-control" name="cf-email" placeholder="robertocarlos@gmail.com">

                        <input type="tel" class="form-control" name="cf-phone" placeholder="461-152-4598"
                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>

                        <textarea class="form-control" rows="3" name="cf-message"
                            placeholder="Comentario"></textarea>

                        <button type="submit" class="form-control" id="submit-button" name="submit">Enviar</button>

                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="signup-agree">
                            <label class="custom-control-label text-small text-muted" for="signup-agree">Acepto 
                                <a href="#">Terminos y condiciones</a>
                            </label>
                        </div>
                    </form>
                </div>

                <div class="modal-footer"></div>

            </div>
        </div>
    </div>
    <?php include __DIR__ . '/footer.php'; ?>