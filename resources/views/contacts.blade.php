@extends('layouts.app2')
@section('content')
@section('title','Contact')
<div>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Nous contactez</h2>
                <p>Vous pouvez avoir plus d'information sur nous!</p>
            </div>
        </div>
        <!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div data-aos="fade-up">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.0987806588937!2d-4.0100339247323635!3d5.401920035179267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc194bffd3c1391%3A0x415a0ed832e5353b!2sEglise%20CMA%20Dokui%201!5e0!3m2!1sfr!2sci!4v1701222935737!5m2!1sfr!2sci"
                    style="border: 0; width: 100%; height: 350px;"
                    frameborder="0"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <div class="container" data-aos="fade-up">
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Localisation:</h4>
                                <p>Abidjan, Abobo Dokui</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@ecomdim.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Téléphone:</h4>
                                <p>+225 0700000000</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">
                        <form class="php-email-form" method="post" action="{{route('contacts')}}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required />
                                    <span class="text-danger">@error('name')Ce champ est obligatoire @enderror</span>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="string" class="form-control" name="phone" id="phone" placeholder="Telephone" required />
                                    <span class="text-danger">@error('phone')Ce champ est obligatoire @enderror</span>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required />
                                <span class="text-danger">@error('email')Ce champ est obligatoire @enderror</span>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" rows="5" placeholder="Message" name="message" required></textarea>
                                <span class="text-danger">@error('message')Ce champ est obligatoire @enderror</span>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>

                            @if(session('success'))
                            <script>
                                alert("{{ session('success') }}");
                            </script>
                            @endif

                            <div class="text-center"><button type="submit">Envoyer</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact Section -->
    </main>
</div>
@endsection
