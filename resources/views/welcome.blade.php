{{-- {{dd($clubs)}} --}}
<script>
   const clubs = [
    @foreach($clubs as $club) 
    {
        "title":'{{$club->name}}',
        "description":' {{$club->description}}',
        "image": '/images/club/{{ $club->image }}'
    },
    @endforeach
];

let currentClubIndex = 0;
function displayClubInfo() {
    const clubTitle = document.getElementById("club-title");
    const clubDescription = document.getElementById("club-description");
    const clubImage = document.getElementById("club-image");

    clubTitle.textContent = clubs[currentClubIndex].title;
    clubDescription.textContent = clubs[currentClubIndex].description;
    clubImage.innerHTML = `<img src="${clubs[currentClubIndex].image}" alt="${clubs[currentClubIndex].title}">`;

    currentClubIndex = (currentClubIndex + 1) % clubs.length;
}

setInterval(displayClubInfo, 4000);

window.onload = function() {
    displayClubInfo();
};


</script>
@extends('layout')
@section('content')
@include('header')
    <!-- banner section start -->
    <div class="banner_section layout_padding">
        <div class="container">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="banner_taital">
                                    <h1 class="outstanding_text">Clubs Universitaires</h1>
                                    <h1 class="coffee_text">Plateforme de Réclamation</h1>
                                    <p class="there_text">Découvrez et partagez vos expériences avec les clubs
                                        universitaires. De nombreuses variations de témoignages sont disponibles, mais
                                        la majorité ont subi des altérations sous différentes formes, parfois même avec
                                        un peu d'humour ajouté.</p>
                                    <div class="learnmore_bt"><a href="#">Plus</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="banner_taital">
                                    <h1 class="outstanding_text">Partagez Votre Voix</h1>
                                    <h1 class="coffee_text">Donnez Votre Avis</h1>
                                    <p class="there_text">Exprimez-vous et partagez vos opinions sur les activités des
                                        clubs universitaires. Votre voix compte et peut aider à améliorer l'expérience
                                        pour tous.</p>
                                    <div class="learnmore_bt"><a href="#">Découvrir</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="banner_taital">
                                    <h1 class="outstanding_text">Connectez-vous</h1>
                                    <h1 class="coffee_text">Communauté Active</h1>
                                    <p class="there_text">Rejoignez une communauté active de membres partageant les
                                        mêmes idées. Connectez-vous avec d'autres étudiants passionnés par les clubs
                                        universitaires.</p>
                                    <div class="learnmore_bt"><a href="#">S'impliquer</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- banner section end -->
    <!-- about section start -->
    <div class="about_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about_taital_main">
                        <div class="about_taital" id="club-title">About Us</div>
                        <p class="about_text" id="club-description">Description du club ici</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about_img" id="club-image"><img src="images/"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- about section end -->
    <!-- testimonial section start -->
    <div class="client_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="client_taital">Les réclamations récentes</h1>
                </div>
            </div>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($reclamations as $key => $reclamation)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                        class="{{ $key == 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($reclamations as $key => $reclamation)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="client_section_2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="testimonial_section_2">
                                            <h4 class="client_name_text">{{ $reclamation->adherant->name }}</h4>
                                            <p class="customer_text">{{$reclamation->CorpReclamation }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- testimonial section end -->
    @include('footer')
@endsection
