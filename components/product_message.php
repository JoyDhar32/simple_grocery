
<?php if (isset($add_cart)) { ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Congratulations',
                            text: 'Product has been added successfully'
                        })
                    </script>

                <?php } ?>

                <?php if (isset($already)) { ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: 'Product already added to cart'
                        })
                    </script>

                <?php } ?>