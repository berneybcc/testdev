<section class="page-section" id="contact">
    <div class="container">

    <!-- Contact Section Heading -->
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Me</h2>

    <!-- Icon Divider -->
    <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
        <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
        <?php $isdisplay ="none" ?>
        @if (!empty($infocontact))
            <?php $isdisplay ="block" ?>
        @endif
        <div class="divider-custom-icon view-info-contact" style="display:{{$isdisplay}}">
        	<a class="js-listcontact nav-link js-scroll-trigger" href="#list-contact" class="h5"><span>view contact </span></a>
        </div>
        
    </div>

    <!-- Contact Section Form -->
    <div class="row">
        <div class="col-lg-8 mx-auto">
        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
        <form action="{{ action('ContactController@save') }}" method="POST" name="sentMessage" id="contactForm" novalidate="novalidate">
            {{ csrf_field() }}
            <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label># Id Number</label>
                
                <input class="form-control" name="id" id="id" type="number" placeholder="Id Number" required="required" data-validation-required-message="Please enter your ID Number.">
                <p class="help-block text-danger"></p>
            </div>
            </div>
            <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Name</label>
                <input class="form-control" name="name" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your Name.">
                <p class="help-block text-danger"></p>
            </div>
            </div>
            <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email Address</label>
                <input class="form-control" name="email" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email Address.">
                <p class="help-block text-danger"></p>
            </div>
            </div>
            <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Phone Number</label>
                <input class="form-control" name="phone" id="phone" type="number" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your Phone Number.">
                <p class="help-block text-danger"></p>
            </div>
            </div>
            <div class="control-group">
            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Message</label>
                <textarea class="form-control" name="message" id="message" rows="2" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
            </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
            </div>
        </form>
        </div>
    </div>

    </div>
</section>