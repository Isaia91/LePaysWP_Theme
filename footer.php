<div class="row mt-5 navcolor">
    <div class="container">
        <!--Section: Contact v.2-->
        <section class="mb-4">

            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4">Contactez nous</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5">Avez-vous des questions ? N'hésitez pas à nous contacter
                directement. Notre équipe vous répondra dans les heures qui suivent pour vous aider.</p>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label for="name" class="">Votre nom</label>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control">
                                    <label for="email" class="">Votre email</label>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label for="subject" class="">Objet</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2"
                                        class="form-control md-textarea"></textarea>
                                    <label for="message">Votre message</label>
                                </div>

                            </div>
                        </div>
                        <!--Grid row-->

                    </form>

                    <div class="text-center text-md-left">
                        <a class="btn" onclick="document.getElementById('contact-form').submit();">Envoyer</a>
                    </div>
                    <div class="status"></div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marker-alt fa-2x"></i>
                            <p>98800 Rue du Commandant Babo, Nouméa 98800, Nouvelle-Calédonie</p>
                        </li>

                        <li><i class="fas fa-phone mt-4 fa-2x"></i>
                            <p>12 34</p>
                        </li>

                        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                            <p>contact@open.nc</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>

        </section>
        <!--Section: Contact v.2-->
    </div>
</div>
<hr>
<div class="container mt-5">
    <footer>
        <?php wp_nav_menu(['theme_location' => 'footer', 'container' => false, 'menu_class' => 'navbar-nav mr-auto']) ?>
    </footer>
</div>
<?php wp_footer() ?>
</body>

</html>