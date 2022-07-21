<?php
  include_once 'header.php';
?>
 <!-- Masthead-->
 <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">
                        <h1 class="text-white font-weight-bold">Welcome to TechReview</h1>
                        <hr class="divider" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 mb-5">We will provide the latest news on our website.</p>
                        <a class="btn btn-primary btn-xl" href="news.php">More News</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-dark text-white">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">About us</h2>
                        <hr class="divider divider-light" />
                        <div class="row gx-5 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                            <div class="container px-4 px-lg-5 h-100">
                            <br>
                            <p class="text-white-75 mb-5">Our aim is to be the source for tech-buying advice and offering everything you need to buy.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
       
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider" />
                    </div>
                </div>
                <form action="includes/indexcontact.php" method="post">
                <?php
                    
                    if(isset($_GET["error"])) {
                        if($_GET["error"] == "none") {
                        echo"<p align=center>Thank you for your responsive!</P>";
                    }
                }
               ?>

                    <div class="form-floating mb-3">
                    <input class="form-control" name="uname" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                    <label for="name">Full name</label>
                    </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="uemail" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" name="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="messages" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                            </div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl" name="submit" type="submit">Submit</button></div>
  
                    </form>
                    </div>
                </div>
                
            </div>
        </section>

<?php
   include_once 'footer.php';
?>
