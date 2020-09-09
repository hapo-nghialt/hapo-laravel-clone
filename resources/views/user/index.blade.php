@extends('layouts.app')
@section('title','HapoLearn')
@section('content')
<div class="main-background-color">
    <section class="banner container-fluid d-flex align-items-center">
        <div class="content-banner">
            <div class="slogan-banner">
                <p class="mb-md-0">Learn Anytime, Anywhere<br>
                <span>at HapoLearn <img alt="" src="images/logoOwl.png"> !</span></p>
            </div>
            <div class="text-banner">
                <p class="mt-md-0 mb-md-4">Interactive lessons, "on-the-go"<br>
                practice, peer support.</p>
            </div>
            <a href="" class="btn btn-start pt-xl-2 pb-xl-3 pb-md-2">Start Learning Now!</a>
        </div>
    </section>
    <div class="blank-banner"></div>
    <section class="main-courses container">
        <div class="row main-courses-content">
            @foreach ($maincourses as $item)
                <div class="main-courses-detail col-xl-4 col-md-4 col-9 px-xl-3 p-md-2 mb-3">
                    <div class="img-courses left-element d-flex justify-content-center align-items-center">
                        <img class="img-main-courses m-xl-5 m-md-4" src="images/logoHTML.png" alt="">
                    </div>
                    <div class="text-courses py-xl-3 py-md-2 mb-5 px-3 d-flex flex-column justify-content-center align-items-center">
                        <b>{{ $item->name }}</b>
                        <p class="m-xl-3 mt-md-1">{{ $item->description }}</p>
                        <a href="" class="btn mb-xl-2 mb-md-3">Take This Course</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="other-courses container">
        <div class="hapo-title d-flex justify-content-center mt-xl-5">
            <span class="underline">Other courses</span>
        </div>
        <div class="row other-courses-content mt-5">
            @foreach ($othercourses as $item)
                <div class="other-courses-detail col-xl-4 col-md-4 col-9 px-xl-3 p-md-2">
                    <div class="img-courses left-element d-flex justify-content-center align-items-center">
                        <img class="img-other-courses" src="images/CSS.png" alt="">
                    </div>
                    <div class="text-other-courses mb-5 px-3 py-xl-2 py-md-1 d-flex flex-column justify-content-center align-items-center">
                        <b class="my-xl-2 my-md-2">{{ $item->name }}</b>
                        <p class="m-xl-3 mb-md-3">{{ $item->description }}</p>
                        <a href="" class="btn mt-xl-1 mb-xl-3 mb-md-3">Take This Course</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-allcourses mt-5 pb-5">
            <a href="#">View All Our Courses <img alt="" src="images/arrow.png"></a>
        </div>
    </section>
    <section class="whyhapo container-fluid mt-5">
        <div class="row">
            <div class="col-md-4 p-0 col-5">
                <span><img class="img-fluid img-whyhapo-left" src="images/laptop.png"></span>
            </div>
            <div class="col-md-8 col-7 whyhapo-title d-xl-none pt-md-5 px-md-0">
                Why HapoLearn?
            </div>
        </div>
        <div class="row whyhapo-content pb-xl-5 pb-md-0">
            <div class="whyhapo-left col-xl-6 col-md-7 col-12 d-flex justify-content-center flex-column align-items-xl-end align-items-center p-md-0 pt-xl-5 mt-xl-5">
                <div class="whyhapo-title d-none d-xl-block mb-xl-3 ">Why HapoLearn?</div>
                <ul class="menu-whyhapo p-0">
                    <li><img alt="" src="images/checkmark.png"> Interactive lessons, "on-the-go" practice, peer support.</li>
                    <li><img alt="" src="images/checkmark.png"> Interactive lessons, "on-the-go" practice, peer support.</li>
                    <li><img alt="" src="images/checkmark.png"> Interactive lessons, "on-the-go" practice, peer support.</li>
                    <li><img alt="" src="images/checkmark.png"> Interactive lessons, "on-the-go" practice, peer support.</li>
                    <li><img alt="" src="images/checkmark.png"> Interactive lessons, "on-the-go" practice, peer support.</li>
                </ul>
            </div>
            <div class="col-xl-6 col-md-5 img-whyhapo-right p-md-0 col-12">
                <img alt="" src="images/laptoptablet.png">
            </div>
        </div>
    </section>
    <section class="feedback container mt-5">
        <div class="hapo-title d-flex justify-content-center mt-xl-5 pt-xl-5 w-100">
            <span class="underline">Feedback</span>
        </div>
        <div class="text-feedback mt-4 mb-5 px-3 d-xl-none d-md-none">
            What other students turned professionals have to say about us after learning with us and reaching their goals
        </div>
        <div class="text-feedback mt-4 mb-5 px-3 d-none d-xl-block d-md-block">
            What other students turned professionals have to say about us<br>
            after learning with us and reaching their goals
        </div>
        <div class="comment">
            <div class="feedback-detail">
                <div class="feedback-content mb-4">
                    <div class="comment-content">
                        <p class="pl-3 py-3">“A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</p>
                    </div>
                </div>
                <div class="user ml-xl-3 pl-3 d-inline-flex flex-row">
                    <img alt="" src="images/kitten-asleep.png">
                    <div class="user-information ml-3">
                        <b>Hoang Anh Nguyen</b>
                        <p class="m-0 p-0">PHP</p><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="feedback-detail">
                <div class="feedback-content mb-4">
                    <div class="comment-content">
                        <p class="pl-3 py-3">“A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</p>
                    </div>
                </div>
                <div class="user ml-xl-3 pl-3 d-inline-flex flex-row">
                    <img alt="" src="images/kitten-asleep.png">
                    <div class="user-information ml-3">
                        <b>Tuan Tran Hoang</b>
                        <p class="m-0 p-0">Python</p><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="feedback-detail">
                <div class="feedback-content mb-4">
                    <div class="comment-content">
                        <p class="pl-3 py-3">“A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</p>
                    </div>
                </div>
                <div class="user ml-xl-3 pl-3 d-inline-flex flex-row">
                    <img alt="" src="images/kitten-asleep.png">
                    <div class="user-information ml-3">
                        <b>Viet Hoang Tran</b>
                        <p class="m-0 p-0">Java</p><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="feedback-detail">
                <div class="feedback-content mb-4">
                    <div class="comment-content">
                        <p class="pl-3 py-3">“A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.”</p>
                    </div>
                </div>
                <div class="user ml-xl-3 pl-3 d-inline-flex flex-row">
                    <img alt="" src="images/kitten-asleep.png">
                    <div class="user-information ml-3">
                        <b>Trong Nghia Le</b>
                        <p class="m-0 p-0">Laravel</p><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hapo-member container-fluid">
        <div class="text-member">
            Become a member of our<br>
            growing community!
        </div>
        <div class="btn-member d-flex justify-content-center">
            <a href="" class="btn pt-xl-3 pb-xl-3 pb-md-2 mt-4">Start Learning Now!</a>
        </div>
    </section>
    <section class="statistic container-fluid mt-5">
        <div class="hapo-title d-flex justify-content-center mt-xl-5 pt-xl-5 w-100">
            <span class="underline">Statistic</span>
        </div>
        <div class="row mt-5 hapo-statistic">
            <div class="statistic-content col-xl-4 col-md-4 col-12 mb-5">
                <p>Courses</p><b>1,586</b>
            </div>
            <div class="statistic-content col-xl-4 col-md-4 col-12 mb-5">
                <p>Lessons</p><b>2,689</b>
            </div>
            <div class="statistic-content col-xl-4 col-md-4 col-12 mb-5">
                <p>Learners</p><b>16,882</b>
            </div>
        </div>
    </section>
</div>
@endsection
