<?php
$title="Message pour l'administrateur";

?>
<body>
  
    <h2 class="h1-responsive font-weight-bold text-center my-4">Saissisez un message pour l'administrateur:</h2>

    
    <div class="row">
        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="message_admin" method="POST">
             <input type="hidden" name="action" value="message_admin" >
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="nom" name="nom" class="form-control" placeholder="Votre nom">
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control"placeholder="Votre e-mail">
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="title" name="title" class="form-control" placeholder="Title">
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" placeholder="Votre message"></textarea>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

    <div class="row">
       <div class="text-center">
              <button type="submit" class="btn btn-lg btn-block btn-outline-primary">ENVOYER</button>
            </div>
    </div>
 </form>
</div>
         



</body>