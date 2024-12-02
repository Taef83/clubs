<footer class="bg-dark1" id="tempaltemo_footer">
        <div class="container">
            <div class="row pt-3">

                <div class="col-md-4 pt-2">
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                           Jubail
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:966-020-0340">966-020-0340</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">clubs@jic.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-2">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Account</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        @if(auth('students')->check())
                        <li><a class="text-decoration-none" href="{{route('student.account')}}">Account Data</a></li>
                        <li><a class="text-decoration-none" href="{{route('student.certificates')}}">Certificates</a></li>
                        @else
                        <li><a class="text-decoration-none" href="{{route('student.login')}}">Login</a></li>
                        <li><a class="text-decoration-none" href="{{route('student.register')}}">Registration</a></li>
                        @endif
                    </ul>
                </div>

                <div class="col-md-4 pt-2">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="{{route('student.home')}}">Home</a></li>
                        <li><a class="text-decoration-none" href="{{route('student.about')}}">About Us</a></li>
                        <li><a class="text-decoration-none" href="{{route('student.contact')}}">Contact</a></li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="w-100 copyRight ">
            <div class="container">
                <div class="row text-center pt-2">
                    <div class="col-12 me-auto">
                        <p class="text-left text-white">
                            Copyright &copy; {{ date('Y') }} Club Team
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </footer>
