 <!-- Footer Start -->
 <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">UTS</span>Grocery</h1>
                </a>
                <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>15 Broadway, Ultimo NSW 2007</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>info@joyustcian.com</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+61424391780</p>
            </div>
            <div class="col-md-4 mb-5">
                <h5 class="font-weight-bold text-dark mb-4">About Us</h5>
            <p style="color:black; font-size:16px; text-align: justify;">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit quasi, aperiam optio beatae, distinctio ipsum natus labore quo maxime vitae quod eos vero autem alias cumque sunt! Natus laboriosam minima fuga, aut mollitia expedita sit! Laudantium eum corporis delectus nihil totam! Nam temporibus obcaecati possimus cum ipsa esse praesentium, accusantium soluta asperiores qui vitae neque et accusamus non nesciunt numquam deleniti ipsum similique, deserunt dolorum explicabo? Ut reprehenderit vel doloribus rerum sequi, optio nihil ullam natus fugit repudiandae dolore odio quos voluptate beatae atque iusto deleniti excepturi inventore incidunt quae eos pariatur quod. Voluptatibus labore cum impedit ipsum. Quisquam, eveniet!
            </p>
                </div>
          
            <div class="col-md-4 mb-5">
                <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                <?php if (isset($message)) { ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Congratulations',
                            text: 'Subscription has been completed successfully'
                        })
                    </script>

                <?php } ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="subscription">
                    <div class="form-group">
                        <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" name="name" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control border-0 py-4" placeholder="Your Email" required="required" name="email" />
                    </div>
                    <div>
                        <button class="btn btn-primary btn-block border-0 py-3" type="submit" name="subscription">Subscribe Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-dark">
                &copy; <a class="text-dark font-weight-semi-bold" href="#">UTS Grocery</a> Designed & Developed
                by
                <a class="text-dark font-weight-semi-bold" href="https://joyustcian.com">Joy Dhar</a>
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="img/payments.png" alt="">
        </div>
    </div>
    <!-- Footer End -->