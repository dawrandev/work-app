@php
$sectionClass = 'resume';
@endphp

@extends('pages.user.profile.index')

@section('profile-content')
<div class="col-lg-8 col-12">
    <div class="inner-content">
        <!-- Start Personal Top Content -->
        <div class="personal-top-content">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-12">
                    <div class="name-head">
                        <a class="mb-2" href="#"><img class="circle-54"
                                src="{{ asset('assets/images/resume/avater.png') }}" alt=""></a>
                        <h4><a class="name" href="#">{{ $offer->user->first_name }} {{ $offer->user->last_name }}</a></h4>
                        <p><a class="deg" href="#">{{ $offer->subcategory->translated_name }}</a></p>
                        <ul class="social">
                            <li><a href="#"><i class="lni lni-facebook-original"></i></a></li>
                            <li><a href="#"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                            <li><a href="#"><i class="lni lni-dribbble"></i></a></li>
                            <li><a href="#"><i class="lni lni-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-12">
                    <div class="content-right">
                        <h5 class="title-main">Contact Info</h5>
                        <!-- Single List -->
                        <div class="single-list">
                            <h5 class="title">District</h5>
                            <p>{{ $offer->district->translated_name }} </p>
                        </div>
                        <!-- Single List -->
                        <!-- Single List -->
                        <div class="single-list">
                            <h5 class="title">Address</h5>
                            <p>{{ $offer->address }}</p>
                        </div>
                        <!-- Single List -->
                        <!-- Single List -->
                        <div class="single-list">
                            <h5 class="title">Phone</h5>
                            <p>+998 {{ $offer->phone }}</p>
                        </div>
                        <!-- Single List -->
                        <!-- Single List -->
                        <div class="single-list">
                            <h5 class="title">Website Linked</h5>
                            <p><a href="#">yourwebsite.com</a></p>
                        </div>
                        <!-- Single List -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Personal Top Content -->
        <!-- Start Single Section -->
        <div class="single-section">
            <h4>About</h4>
            <p class="font-size-4 mb-8">A talented professional with an academic background
                in IT and proven
                commercial development experience as C++ developer since 1999. Has a sound
                knowledge of the software
                development life cycle. Was involved in more than 140 software development
                outsourcing projects.</p>
            <p class="font-size-4 mb-8">Programming Languages: C/C++, .NET C++, Python,
                Bash, Shell, PERL, Regular
                expressions, Python, Active-script.</p>
        </div>
        <!-- End Single Section -->
        <!-- Start Single Section -->
        <div class="single-section skill">
            <h4>Skills</h4>
            <ul class="list-unstyled d-flex align-items-center flex-wrap">
                <li>
                    <a href="#">Agile</a>
                </li>
                <li>
                    <a href="#">Wireframing</a>
                </li>
                <li>
                    <a href="#">Prototyping</a>
                </li>
                <li>
                    <a href="#">Information</a>
                </li>
                <li>
                    <a href="#">Waterfall Model</a>
                </li>
                <li>
                    <a href="#">New Layout</a>
                </li>
                <li>
                    <a href="#">Ui/Ux Design</a>
                </li>
                <li>
                    <a href="#">Web Design</a>
                </li>
                <li>
                    <a href="#">Graphics Design</a>
                </li>
            </ul>
        </div>
        <!-- End Single Section -->
        <!-- Start Single Section -->
        <div class="single-section exprerience">
            <h4>Work Exprerience</h4>
            <!-- Single Exp -->
            <div class="single-exp mb-30">
                <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                    <div class="image">
                        <img src="assets/images/resume/work1.png" alt="#">
                    </div>
                    <div class="w-100 mt-n2">
                        <h3 class="mb-0">
                            <a href="#">Lead Product Designer</a>
                        </h3>
                        <a href="#">Airabnb</a>
                        <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                            <a href="#">Jun 2020 - April 2023- 3 years</a>
                            <a href="#" class="font-size-3 text-gray">
                                <span class="mr-2" style="margin-top: -2px"><i
                                        class="lni lni-map-marker"></i></span>New York, USA</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Exp -->
            <!-- Single Exp -->
            <div class="single-exp mb-30">
                <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                    <div class="image">
                        <img src="assets/images/resume/work2.png" alt="#">
                    </div>
                    <div class="w-100 mt-n2">
                        <h3 class="mb-0">
                            <a href="#">Senior UI/UX Designer</a>
                        </h3>
                        <a href="#">Google Inc</a>
                        <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                            <a href="#">Jun 2020 - April 2023- 3 years</a>
                            <a href="#" class="font-size-3 text-gray">
                                <span class="mr-2" style="margin-top: -2px"><i
                                        class="lni lni-map-marker"></i></span>New York, USA</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Exp -->
        </div>
        <!-- End Single Section -->
        <!-- Start Single Section -->
        <div class="single-section education">
            <h4>Education</h4>
            <!-- Single Edu -->
            <div class="single-edu mb-30">
                <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                    <div class="image">
                        <img src="assets/images/resume/edu1.svg" alt="#">
                    </div>
                    <div class="w-100 mt-n2">
                        <h3 class="mb-0">
                            <a href="#">Masters in Art Design</a>
                        </h3>
                        <a href="#">Harvard University</a>
                        <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                            <a href="#">Jun 2020 - April 2023- 3 years</a>
                            <a href="#" class="font-size-3 text-gray">
                                <span class="mr-2" style="margin-top: -2px"><i
                                        class="lni lni-map-marker"></i></span>Brylin, USA</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Edu -->
            <!-- Single Edu -->
            <div class="single-edu mb-30">
                <div class="d-flex align-items-center pr-11 mb-9 flex-wrap flex-sm-nowrap">
                    <div class="image">
                        <img src="assets/images/resume/edu2.svg" alt="#">
                    </div>
                    <div class="w-100 mt-n2">
                        <h3 class="mb-0">
                            <a href="#">Bachelor in Software Engineering</a>
                        </h3>
                        <a href="#">Manipal Institute of Technology</a>
                        <div class="d-flex align-items-center justify-content-md-between flex-wrap">
                            <a href="#">Fed 2019 - April 2023 - 4 years </a>
                            <a href="#" class="font-size-3 text-gray">
                                <span class="mr-2" style="margin-top: -2px"><i
                                        class="lni lni-map-marker"></i></span>New York, USA</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Edu -->
        </div>
        <!-- End Single Section -->
    </div>
</div>
@endsection