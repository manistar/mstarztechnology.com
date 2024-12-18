<style>
    .form-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;

    }

    .form-row>* {
        flex: 1;
        margin-right: 10px;
    }

    .form-row>*:last-child {
        margin-right: 0;
    }

    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
        }

        .form-row>* {
            margin-right: 0;
            margin-bottom: 10px;
        }

        .form-row>*:last-child {
            margin-bottom: 0;
        }
</style>
<!-- Start Contact section -->
<div class="rn-contact-area rn-section-gap section-separator" id="contacts">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <span class="subtitle">Contact</span>
                    <h2 class="title">Contact With Me</h2>
                </div>
            </div>
        </div>


        <div class="row mt--50 mt_md--40 mt_sm--40 mt-contact-sm">
            <div class="col-lg-5">
                <div class="contact-about-area">
                    <div class="thumbnail">
                        <img src="assets/images/contact/contact1.png" alt="contact-img">
                    </div>
                    <div class="title-area">
                        <h4 class="title">Ayokunle Vincent</h4>
                        <span>Chief Operating Officer</span>
                    </div>
                    <div class="description">
                        <p>I am available for freelance work. Connect with me via and call in to my account.
                        </p>
                        <span class="phone">Phone: <a
                                href="tel:<?= $profiles['phone']; ?>"><?= $profiles['phone']; ?></a></span>
                        <span class="mail">Email: <a
                                href="mailto:mstarztech@outlook.com"><?= $profiles['email']; ?></a></span>
                    </div>
                    <div class="social-area">
                        <div class="name">FIND WITH ME</div>
                        <div class="social-icone">
                            <a href="https://facebook.com/manistar1"><i data-feather="facebook"></i></a>
                            <a href="https://www.linkedin.com/in/ayokunle-ogunsakin-6808491b0/"><i
                                    data-feather="linkedin"></i></a>
                            <a href="https://instagram.com/Manistar_official1"><i data-feather="instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div data-aos-delay="600" class="col-lg-7 contact-input">

                <div class="contact-form-wrapper">
                    <div class="introduce">
                        <form action="passer" id="foo" method="POST" class="rnt-contact-form rwt-dynamic-form row"
                            id="contactForm">
                            <div class="form-row">
                                <?= $c->create_form(array_slice($contact, 0, 2)); ?>
                                <!-- First row -->
                            </div>

                            <div class="form-row">
                                <?= $c->create_form(array_slice($contact, 2, 2)); ?>
                                <!-- Second row -->
                            </div>

                            <div class="form-group">
                                <?= $c->create_form(array_slice($contact, 4, 2)); ?>
                                <!-- Second row -->
                            </div>

                            <div class="form-group">
                                <?= $c->create_form(array_slice($contact, 6, 2)); ?>
                                <!-- Second row -->
                            </div>

                            <div class="form-group">
                                <?= $c->create_form(array_slice($contact, 8, 2)); ?>
                                <!-- Second row -->
                            </div>

                            <input type="hidden" name="submit_btn" value="">
                            <div id="custommessage"></div>
                            <div class="g-recaptcha" data-sitekey="6LdNUY4qAAAAAGkKVk3TASRyQttYZZ_G81JI8hMG" data-callback="onSubmit"></div>
                            <div class="submit-row">
                                <center>
                                    <div class="col-md-12">
                                        <div class="form-group " style="padding-left: 15px">
                                            <input type="submit" class="btn btn-success" onclick="submitForm()" value="SEND MESSAGE">
                                            <!-- <i data-feather="arrow-right"></i> -->
                                        </div>
                                    </div>
                                </center>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contuct section -->
 <script>
    function submitForm() {
    // Manually trigger the reCAPTCHA check
    grecaptcha.execute();
}

// Callback function when reCAPTCHA is successful
function onSubmit(token) {
    const formData = new FormData(document.getElementById('contactForm'));
    formData.append('g-recaptcha-response', token);

    // AJAX request to send form data to the server
    fetch('your-backend-url.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert(data.message);
        } else {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

 </script>