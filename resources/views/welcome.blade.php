<div>
      <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>
                Ecole Du Dimanche<br />
                CMA Dokui 1
            </h1>
            <h2>Notre vision former des disciples pour JESUS</h2>
            <a href="/admin" class="btn-get-started">Se connecter</a>
        </div>
    </section>
    <!-- End Hero -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            @php($i = 0)
            @foreach ($actualities->take(4) as $actuality )
                @php($i++)
                @if ($i == 1)
                    <div class="row pt-4">
                        <div class="order-1 col-lg-6 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                            @if(!empty($actuality->getMedia('image')->first()))
                                <img  class="img-fluid" src="{{ url($actuality->getMedia('image')->first()->getUrl('normal')) }}" alt="{{ $actuality->title }}">
                            @endif
                        </div>
                        <div class="order-2 pt-4 col-lg-6 pt-lg-0 order-lg-1 content">
                            <h3>{{ $actuality->title }}</h3>
                            <p class="fst-italic">
                                {{ $actuality->subtitle }}
                            </p>
                            <p>
                                {!! Str::limit($actuality->content) !!}
                            </p>
                        </div>
                    </div>
                @elseif ($i == 2)
                    <div class="row pt-4">
                        <div class="order-1 pt-4 col-lg-6 pt-lg-0 order-lg-2 content">
                            <h3>{{ $actuality->title }}</h3>
                            <p class="fst-italic">
                                {{ $actuality->subtitle }}
                            </p>
                            <p>
                                {!! Str::limit($actuality->content) !!}
                            </p>
                        </div>
                        <div class="order-2 col-lg-6 order-lg-1" data-aos="fade-left" data-aos-delay="100">
                            @if(!empty($actuality->getMedia('image')->first()))
                                <img  class="img-fluid" src="{{ url($actuality->getMedia('image')->first()->getUrl('normal')) }}" alt="{{ $actuality->title }}">
                            @endif
                        </div>
                    </div>
                @elseif ($i == 3)
                    <div class="row pt-4">
                        <div class="order-1 col-lg-6 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                            @if(!empty($actuality->getMedia('image')->first()))
                                <img  class="img-fluid" src="{{ url($actuality->getMedia('image')->first()->getUrl('normal')) }}" alt="{{ $actuality->title }}">
                            @endif
                        </div>
                        <div class="order-2 pt-4 col-lg-6 pt-lg-0 order-lg-1 content">
                            <h3>{{ $actuality->title }}</h3>
                            <p class="fst-italic">
                                {{ $actuality->subtitle }}
                            </p>
                            <p>
                                {!! Str::limit($actuality->content) !!}
                            </p>
                        </div>
                    </div>
                @else
                    <div class="row pt-4">
                        <div class="order-1 pt-4 col-lg-6 pt-lg-0 order-lg-2 content">
                            <h3>{{ $actuality->title }}</h3>
                            <p class="fst-italic">
                                {{ $actuality->subtitle }}
                            </p>
                            <p>
                                {!! Str::limit($actuality->content) !!}
                            </p>
                        </div>
                        <div class="order-2 col-lg-6 order-lg-1" data-aos="fade-left" data-aos-delay="100">
                            @if(!empty($actuality->getMedia('image')->first()))
                                <img  class="img-fluid" src="{{ url($actuality->getMedia('image')->first()->getUrl('normal')) }}" alt="{{ $actuality->title }}">
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-4 d-flex align-items-stretch">
                    <div class="content">
                        <h3>Notre vision</h3>
                        <p class="text-center">
                            Faire connaitre aux enfants l'importance d'accepter JESUS, lui donner tous les atouts pour faire de lui un outils éfficace pour l'eglise et pour la société.
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="mt-4 icon-box mt-xl-0">
                                    <i class="bx bx-receipt"></i>
                                    <h4>Notre objectif</h4>
                                    <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="mt-4 icon-box mt-xl-0">
                                    <i class="bx bx-cube-alt"></i>
                                    <h4>Notre mission</h4>
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex align-items-stretch">
                                <div class="mt-4 icon-box mt-xl-0">
                                    <i class="bx bx-images"></i>
                                    <h4>Notre engagement</h4>
                                    <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .content-->
                </div>
            </div>
        </div>
    </section>
    <!-- End Why Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
        <div class="container">
            <div class="row counters">
                <div class="text-center col-lg-4 col-6">
                    <span data-purecounter-start="0" data-purecounter-end="1232" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Notre d'enfants</p>
                </div>

                <div class="text-center col-lg-4 col-6">
                    <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Moniteurs</p>
                </div>

                <div class="text-center col-lg-4 col-6">
                    <span data-purecounter-start="0" data-purecounter-end="8" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Classes</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= Features Section ======= -->
    {{--
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-lg-3 col-md-4">
                    <div class="icon-box">
                        <i class="ri-store-line" style="color: #ffbb2c;"></i>
                        <h3><a href="">Lorem Ipsum</a></h3>
                    </div>
                </div>
                <div class="mt-4 col-lg-3 col-md-4 mt-md-0">
                    <div class="icon-box">
                        <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                        <h3><a href="">Dolor Sitema</a></h3>
                    </div>
                </div>
                <div class="mt-4 col-lg-3 col-md-4 mt-md-0">
                    <div class="icon-box">
                        <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                        <h3><a href="">Sed perspiciatis</a></h3>
                    </div>
                </div>
                <div class="mt-4 col-lg-3 col-md-4 mt-lg-0">
                    <div class="icon-box">
                        <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
                        <h3><a href="">Magni Dolores</a></h3>
                    </div>
                </div>
                <div class="mt-4 col-lg-3 col-md-4">
                    <div class="icon-box">
                        <i class="ri-database-2-line" style="color: #47aeff;"></i>
                        <h3><a href="">Nemo Enim</a></h3>
                    </div>
                </div>
                <div class="mt-4 col-lg-3 col-md-4">
                    <div class="icon-box">
                        <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
                        <h3><a href="">Eiusmod Tempor</a></h3>
                    </div>
                </div>
                <div class="mt-4 col-lg-3 col-md-4">
                    <div class="icon-box">
                        <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                        <h3><a href="">Midela Teren</a></h3>
                    </div>
                </div>
                <div class="mt-4 col-lg-3 col-md-4">
                    <div class="icon-box">
                        <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
                        <h3><a href="">Pira Neve</a></h3>
                    </div>
                </div>
                <div class="mt-4 col-lg-3 col-md-4">
                    <div class="icon-box">
                        <i class="ri-anchor-line" style="color: #b2904f;"></i>
                        <h3><a href="">Dirada Pack</a></h3>
                    </div>
                </div>
                <div class="mt-4 col-lg-3 col-md-4">
                    <div class="icon-box">
                        <i class="ri-disc-line" style="color: #b20969;"></i>
                        <h3><a href="">Moton Ideal</a></h3>
                    </div>
                </div>
                <div class="mt-4 col-lg-3 col-md-4">
                    <div class="icon-box">
                        <i class="ri-base-station-line" style="color: #ff5828;"></i>
                        <h3><a href="">Verdo Park</a></h3>
                    </div>
                </div>
                <div class="mt-4 col-lg-3 col-md-4">
                    <div class="icon-box">
                        <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
                        <h3><a href="">Flavor Nivelanda</a></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    --}}<!-- End Features Section -->

    <!-- ======= Trainers Section ======= -->
    <section id="trainers" class="trainers">
        <div class="container" data-aos="fade-up">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="" />
                        <div class="member-content">
                            <h4>Tonton Pacôme</h4>
                            <span>Responsable ED</span>
                            <p>
                                Le responsable veille à la bonne marche de la vision
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="assets/img/trainers/trainer-2.jpg" class="img-fluid" alt="" />
                        <div class="member-content">
                            <h4>Tonton Pascal</h4>
                            <span>Conseiller</span>
                            <p>
                                Le conseiller aide le responsable dans sa tâche
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="assets/img/trainers/trainer-3.jpg" class="img-fluid" alt="" />
                        <div class="member-content">
                            <h4>Tonton Odilon</h4>
                            <span>Sécretaire</span>
                            <p>
                                Le sécretaire est le réprentant du responsable
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Trainers Section -->
</div>
