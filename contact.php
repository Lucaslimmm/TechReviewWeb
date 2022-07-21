<?php
   include_once 'header.php';
?>

         <!--Header-->
         <header class="infohead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-items-center">
                        <h1 class="text-white font-weight-bold">Contact Us</h1>
                    </div>
                </div>
            </div>
        </header>

        <!-- Contact-->
        <br>
        <br>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <p class="text-muted mb-5">Any update? Send us a messages and we will get back to you as soon as possible!</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                    <form action="includes/contact.inc.php" method="post">

                <?php
                    
                    if(isset($_GET["error"])) {
                        if($_GET["error"] == "none") {
                        echo"<p align=center>Thank you for your responsive!</P>";
                    }
                        if($_GET["error"] == "emptyinput") {
                        echo"<p align=center>Please fill up all fields!</P>";
                    }

                    }
               ?>

    <?php
    if (isset($_SESSION['useruid'])) {?>
    <div class="form-floating mb-3">
                    <input class="form-control" name="uname" type="text" value="<?php echo $_SESSION["useruid"]?>" data-sb-validations="required" />
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
                <?php
                }else{
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

                <?php } ?>
                
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="bi-phone fs-2 mb-3 text-muted"></i>
                        <div>Contact Us</div>
                        <br>
                        <div>+60 12-3456789</div>
                        <br>
                        <div>Xiuxiuuu888@gmail.com</div>
                    </div>
                </div>
            </div>
            <br>
            <br>

<?php
   include_once 'footer.php';
?>