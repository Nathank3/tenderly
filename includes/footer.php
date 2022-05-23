<footer id="footer" class="footer color-bg">
    <div class="links-social inner-top-sm">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <!-- ============================================================= CONTACT INFO ============================================================= -->
                    <div class="contact-info">
                        <div class="footer-logo">
                            <div class="logo">
                                <a href="index.php">

                                    <h3>Tenderly</h3>
                                </a>
                            </div><!-- /.logo -->

                        </div><!-- /.footer-logo -->

                        <div class="module-body m-t-20">
                            <p class="about-us">For more information contact me on social media platforms </p>

                            <div class="social-icons">

                                <a href="http://facebook.com/transvelo" class='active'><i
                                        class="icon fa fa-facebook"></i></a>
                                <a href="#"><i class="icon fa fa-twitter"></i></a>
                                <a href="#"><i class="icon fa fa-linkedin"></i></a>
                                <a href="#"><i class="icon fa fa-rss"></i></a>
                                <a href="#"><i class="icon fa fa-pinterest"></i></a>

                            </div><!-- /.social-icons -->
                        </div><!-- /.module-body -->

                    </div><!-- /.contact-info -->
                    <!-- ============================================================= CONTACT INFO : END ============================================================= -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-4">
                    <!-- ============================================================= CONTACT TIMING============================================================= -->
                    <div class="contact-timing">
                        <div class="module-heading">
                            <h4 class="module-title">Contact time</h4>
                        </div><!-- /.module-heading -->

                        <div class="module-body outer-top-xs">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Monday-Friday:</td>
                                            <td class="pull-right">0800hrs To 1800hrs</td>
                                        </tr>
                                        <tr>
                                            <td>Saturday:</td>
                                            <td class="pull-right">0900hrs To 1500hrs</td>
                                        </tr>
                                        <tr>
                                            <td>Sunday:</td>
                                            <td class="pull-right">1300hrs To 1500hrs</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- /.table-responsive -->
                        </div><!-- /.module-body -->
                    </div><!-- /.contact-timing -->
                    <!-- ============================================================= CONTACT TIMING : END ============================================================= -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-4">
                    -->
                    <!-- ============================================================= INFORMATION============================================================= -->
                    <div class="contact-information">
                        <div class="module-heading">
                            <h4 class="module-title">Contact information</h4>
                        </div><!-- /.module-heading -->

                        <div class="module-body outer-top-xs">
                            <ul class="toggle-footer" style="">
                                <li class="media">
                                    <div class="pull-left">
                                        <span class="icon fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p>Kenya, Makueni</p>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="pull-left">
                                        <span class="icon fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p>0748128936<br>0718128936</p>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="pull-left">
                                        <span class="icon fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <span><a href="#">hellohello1@gmail.com</a></span>
                                    </div>
                                </li>

                            </ul>
                        </div><!-- /.module-body -->
                    </div><!-- /.contact-timing -->
                    <!-- ============================================================= INFORMATION : END ============================================================= -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.links-social -->


    <script>
    function TimeRemaining() {
        var els = document.querySelectorAll('[id^="trip_"]');
        for (var i = 0; i < els.length; i++) {
            var el_id = els[i].getAttribute('id');
            var end_time = el_id.split('_')[1];
            var deadline = new Date(end_time);
            var now = new Date();
            var t = Math.floor(deadline.getTime() - now.getTime());
            var days = Math.floor(t / (1000 * 60 * 60 * 24));
            var hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((t % (1000 * 60)) / 1000);
            if (t < 0) {
                document.getElementById("trip_" + end_time).innerHTML = 'Closed';
            } else {
                document.getElementById("trip_" + end_time).innerHTML = days + "d " + hours + "h " + minutes + "m " +
                    seconds + "s";
            }
        }
    }

    function StartTimeRemaining() {
        TimeRemaining();
        setInterval(function() {
            TimeRemaining();
        }, 1000)
    }


    StartTimeRemaining();
    </script>