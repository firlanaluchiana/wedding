@extends('layouts.home')
@section('content')
    <div id="page">
        <nav class="fh5co-nav" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="fh5co-logo"><a href="{{ route('home.index') }}">Wedding<strong>.</strong></a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li class="active"><a href="{{ route('home.index') }}">Home</a></li>
                            <li><a href="#wedding_event">Event</a></li>
                            <li><a href="#story">Story</a></li>
                            <li><a href="#wedding_gallery">Wedding Gallery</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>

        <header id="fh5co-header" class="fh5co-cover" role="banner"
            style="background-image:url({{ asset('tehome/images/wedding-bg.jpg') }});" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="display-t">
                            <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                <h1>{{ $wedding->groom_name }} &amp; {{ $wedding->bride_name }}</h1>
                                <h2>We Are Getting Married</h2>
                                <div class="simply-countdown simply-countdown-one"></div>
                                <p><a href="#" class="btn btn-default btn-sm">Save the date</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="fh5co-couple">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                        <h2>Hello!</h2>
                        <h1>{{ $wedding->groom_name }} &amp; {{ $wedding->bride_name }}</h1>
                        <h3>{{ \Carbon\Carbon::parse($wedding->wedding_date)->format('F jS Y') }}, {{ $wedding->venue }}
                            {{ $wedding->city }}</h3>
                        <p>We invited you to celebrate our wedding</p>
                    </div>
                </div>
                <div class="couple-wrap animate-box">
                    <div class="couple-half">
                        <div class="groom">
                            <img src="{{ secure_url('storage/' . $wedding->groom_image) }}"
                                alt="{{ $wedding->groom_name }}" class="img-responsive">
                        </div>
                        <div class="desc-groom">
                            <h3>{{ $wedding->groom_name }}</h3>
                            <p>{{ $wedding->groom_bio }}</p>
                        </div>
                    </div>
                    <p class="heart text-center"><i class="icon-heart2"></i></p>
                    <div class="couple-half">
                        <div class="bride">
                            <img src="{{ secure_url('storage/' . $wedding->bride_image) }}"
                                alt="{{ $wedding->bride_name }}" class="img-responsive">
                        </div>
                        <div class="desc-bride">
                            <h3>{{ $wedding->bride_name }}</h3>
                            <p>{{ $wedding->bride_bio }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-event" class="fh5co-bg" style="background-image:url(images/img_bg_3.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                        <span>Our Special Events</span>
                        <h2 id="wedding_event">Wedding Events</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="display-t">
                        <div class="display-tc">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="col-md-6 col-sm-6 text-center">
                                    <div class="event-wrap animate-box">
                                        <h3>Main Ceremony</h3>
                                        <div class="event-col">
                                            <i class="icon-clock"></i>
                                            <span>{{ \Carbon\Carbon::parse($wedding->ceremony_start)->format('H:i') . ' WIB' }}</span>
                                            <span>{{ \Carbon\Carbon::parse($wedding->ceremony_end)->format('H:i') . ' WIB' }}</span>
                                        </div>
                                        <div class="event-col">
                                            <i class="icon-calendar"></i>
                                            <span>{{ \Carbon\Carbon::parse($wedding->ceremony_start)->format('l, d') }}
                                            </span>
                                            <span>{{ \Carbon\Carbon::parse($wedding->ceremony_start)->format('F Y') }}
                                            </span>
                                        </div>
                                        <p>{{ $wedding->ceremony }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 text-center">
                                    <div class="event-wrap animate-box">
                                        <h3>Wedding Party</h3>
                                        <div class="event-col">
                                            <i class="icon-clock"></i>
                                            <span>{{ \Carbon\Carbon::parse($wedding->party_start)->format('H:i') . ' WIB' }}</span>
                                            <span>{{ \Carbon\Carbon::parse($wedding->party_start)->format('H:i') . ' WIB' }}</span>
                                        </div>
                                        <div class="event-col">
                                            <i class="icon-calendar"></i>
                                            <span>{{ \Carbon\Carbon::parse($wedding->party_start)->format('l, d') }}
                                            </span>
                                            <span>{{ \Carbon\Carbon::parse($wedding->party_start)->format('F Y') }}
                                            </span>
                                        </div>
                                        <p>{{ $wedding->party }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-couple-story">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                        <span>We Love Each Other</span>
                        <h2 id="story">Our Story</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-md-offset-0">
                        <ul class="timeline animate-box">
                            @foreach ($storys as $story)
                                <li class="{{ $loop->iteration % 2 === 0 ? 'timeline-inverted' : '' }} animate-box">
                                    <div class="timeline-badge"
                                        style="background-image:url({{ secure_url('storage/' . $story->image) }});"></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h3 class="timeline-title">{{ $story->title }}</h3>
                                            <span class="date">{{ $story->date }}</span>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{{ $story->description }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-gallery" class="fh5co-section-gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                        <span>Our Memories</span>
                        <h2 id="wedding_gallery">Wedding Gallery</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                    </div>
                </div>
                <div class="row row-bottom-padded-md">
                    <div class="col-md-12">
                        <ul id="fh5co-gallery-list">

                            <li class="one-third animate-box" data-animate-effect="fadeIn"
                                style="background-image:url({{ asset('tehome/images/wedding-bg.jpg') }});">
                                <a href="images/gallery-1.jpg">
                                    <div class="case-studies-summary">
                                        <span>14 Photos</span>
                                        <h2>Two Glas of Juice</h2>
                                    </div>
                                </a>
                            </li>
                            <li class="one-third animate-box" data-animate-effect="fadeIn"
                                style="background-image:url({{ asset('tehome/images/cpw.jpg') }});">
                                <a href="#" class="color-2">
                                    <div class="case-studies-summary">
                                        <span>30 Photos</span>
                                        <h2>Timer starts now!</h2>
                                    </div>
                                </a>
                            </li>


                            <li class="one-third animate-box" data-animate-effect="fadeIn"
                                style="background-image:url({{ asset('tehome/images/cpw1.jpg') }});">
                                <a href="#" class="color-3">
                                    <div class="case-studies-summary">
                                        <span>90 Photos</span>
                                        <h2>Beautiful sunset</h2>
                                    </div>
                                </a>
                            </li>
                            <li class="one-third animate-box" data-animate-effect="fadeIn"
                                style="background-image:url({{ asset('tehome/images/cpw2.jpg') }});">
                                <a href="#" class="color-4">
                                    <div class="case-studies-summary">
                                        <span>12 Photos</span>
                                        <h2>Company's Conference Room</h2>
                                    </div>
                                </a>
                            </li>

                            <li class="one-third animate-box" data-animate-effect="fadeIn"
                                style="background-image:url({{ asset('tehome/images/cpw3.jpg') }});">
                                <a href="#" class="color-3">
                                    <div class="case-studies-summary">
                                        <span>50 Photos</span>
                                        <h2>Useful baskets</h2>
                                    </div>
                                </a>
                            </li>
                            <li class="one-third animate-box" data-animate-effect="fadeIn"
                                style="background-image:url({{ asset('tehome/images/cpw.jpg') }});">
                                <a href="#" class="color-4">
                                    <div class="case-studies-summary">
                                        <span>45 Photos</span>
                                        <h2>Skater man in the road</h2>
                                    </div>
                                </a>
                            </li>

                            <li class="one-third animate-box" data-animate-effect="fadeIn"
                                style="background-image:url({{ asset('tehome/images/cpw1.jpg') }});">
                                <a href="#" class="color-4">
                                    <div class="case-studies-summary">
                                        <span>35 Photos</span>
                                        <h2>Two Glas of Juice</h2>
                                    </div>
                                </a>
                            </li>

                            <li class="one-third animate-box" data-animate-effect="fadeIn"
                                style="background-image:url({{ asset('tehome/images/cpw2.jpg') }});">
                                <a href="#" class="color-5">
                                    <div class="case-studies-summary">
                                        <span>90 Photos</span>
                                        <h2>Timer starts now!</h2>
                                    </div>
                                </a>
                            </li>
                            <li class="one-third animate-box" data-animate-effect="fadeIn"
                                style="background-image:url({{ asset('tehome/images/cpw3.jpg') }});">
                                <a href="#" class="color-6">
                                    <div class="case-studies-summary">
                                        <span>56 Photos</span>
                                        <h2>Beautiful sunset</h2>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-counter" class="fh5co-bg fh5co-counter"
            style="background-image:url({{ asset('tehome/images/wedding-bg.jpg') }});">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="display-t">
                        <div class="display-tc">
                            <div class="col-md-3 col-sm-6 animate-box">
                                <div class="feature-center">
                                    <span class="icon">
                                        <i class="icon-users"></i>
                                    </span>

                                    <span class="counter js-counter" data-from="0" data-to="500" data-speed="5000"
                                        data-refresh-interval="50">1</span>
                                    <span class="counter-label">Estimated Guest</span>

                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 animate-box">
                                <div class="feature-center">
                                    <span class="icon">
                                        <i class="icon-user"></i>
                                    </span>

                                    <span class="counter js-counter" data-from="0" data-to="1000" data-speed="5000"
                                        data-refresh-interval="50">1</span>
                                    <span class="counter-label">We Catter</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 animate-box">
                                <div class="feature-center">
                                    <span class="icon">
                                        <i class="icon-calendar"></i>
                                    </span>
                                    <span class="counter js-counter" data-from="0" data-to="402" data-speed="5000"
                                        data-refresh-interval="50">1</span>
                                    <span class="counter-label">Events Done</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 animate-box">
                                <div class="feature-center">
                                    <span class="icon">
                                        <i class="icon-clock"></i>
                                    </span>

                                    <span class="counter js-counter" data-from="0" data-to="2345" data-speed="5000"
                                        data-refresh-interval="50">1</span>
                                    <span class="counter-label">Hours Spent</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-testimonial">
            <div class="container">
                <div class="row">
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <span>Best Wishes</span>
                            <h2>Friends Wishes</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 animate-box">
                            <div class="wrap-testimony">
                                <div class="owl-carousel-fullwidth">
                                    <div class="item">
                                        <div class="testimony-slide active text-center">
                                            <figure>
                                                <img src="{{ asset('tehome/images/hinata.jpg') }}" alt="user">
                                            </figure>
                                            <span>Hinata Hyuga, via <a href="#" class="twitter">Twitter</a></span>
                                            <blockquote>
                                                <p>"Far far away, behind the word mountains, far from the countries
                                                    Vokalia and Consonantia, there live the blind texts. Separated they
                                                    live in Bookmarksgrove right at the coast of the Semantics"</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-slide active text-center">
                                            <figure>
                                                <img src="{{ asset('tehome/images/hinata.jpg') }}" alt="Hinata Hyuga">
                                            </figure>
                                            <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                            <blockquote>
                                                <p>"Far far away, behind the word mountains, far from the countries
                                                    Vokalia and Consonantia, at the coast of the Semantics, a large
                                                    language ocean."</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="testimony-slide active text-center">
                                            <figure>
                                                <img src="{{ asset('tehome/images/hinata.jpg') }}" alt="Hinata Hyuga">
                                            </figure>
                                            <span>John Doe, via <a href="#" class="twitter">Twitter</a></span>
                                            <blockquote>
                                                <p>"Far far away, far from the countries Vokalia and Consonantia, there
                                                    live the blind texts. Separated they live in Bookmarksgrove right at
                                                    the coast of the Semantics, a large language ocean."</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="fh5co-services" class="fh5co-section-gray">
            <div class="container">

                <div class="row animate-box">
                    <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                        <h2>We Offer Services</h2>
                        <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem
                            provident. Odit ab aliquam dolor eius.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
                            <span class="icon">
                                <i class="icon-calendar"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>We Organized Events</h3>
                                <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos
                                    cumque dicta adipisci architecto culpa amet.</p>
                            </div>
                        </div>

                        <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
                            <span class="icon">
                                <i class="icon-image"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Photoshoot</h3>
                                <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos
                                    cumque dicta adipisci architecto culpa amet.</p>
                            </div>
                        </div>

                        <div class="feature-left animate-box" data-animate-effect="fadeInLeft">
                            <span class="icon">
                                <i class="icon-video"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Video Editing</h3>
                                <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos
                                    cumque dicta adipisci architecto culpa amet.</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 animate-box">
                        <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/2Vv-BfVoq4g?si=YUMO_QT4uEDRZI7L&amp;controls=0&amp;start=48"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <div id="fh5co-started" class="fh5co-bg" style="background-image:url(images/sakura.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Are You Attending?</h2>
                    <p>Please Fill-up the form to notify you that you're attending. Thanks.</p>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-10 col-md-offset-1">
                    <form class="form-inline">
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <input type="name" class="form-control" id="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <button type="submit" class="btn btn-default btn-block">I am Attending</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer id="fh5co-footer" role="contentinfo">
        <div class="container">

            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block">&copy; 2025 Free HTML5. All Rights Reserved.</small>
                        <small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a>
                            Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
                    </p>
                    <p>
                    <ul class="fh5co-social-icons">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    </ul>
                    </p>
                </div>
            </div>

        </div>
    </footer>
    </div>
@endsection
