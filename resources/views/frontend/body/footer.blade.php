@php

$footer_content = App\Models\Footer::find(1);

@endphp
<footer class="footer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-4">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Contact us</h5>
                        <h4 class="title">{{ $footer_content->number }}</h4>
                    </div>
                    <div class="footer__widget__text">
                        <p>{{ $footer_content->short_description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">my address</h5>
                        <h4 class="title">UNITED KINGDOM</h4>
                    </div>
                    <div class="footer__widget__address">
                        <p>{{ $footer_content->address }}</p>
                        <a href="mailto:{{ $footer_content->email }}" class="mail">{{ $footer_content->email }}</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__widget">
                    <div class="fw-title">
                        <h5 class="sub-title">Follow me</h5>
                        <h4 class="title">socially connect</h4>
                    </div>
                    <div class="footer__widget__social">
                        <p>Please connect and stay apprised. <br> Smart Tech, Smart Life.</p>
                        <ul class="footer__social__list">
                            <li><a href="{{ $footer_content->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $footer_content->twitter }}"><i class="fab fa-twitter"></i></a></li>                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__wrap">
            <div class="row">
                <div class="col-12">
                    <div class="copyright__text text-center">
                        <p>{{ $footer_content->copyright }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>