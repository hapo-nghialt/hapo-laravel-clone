@extends('layouts.app')
@section('title')
    Course | {{ $courseDetail->name }}
@endsection
@section('content')
<div class="header-course-detail container-fluid py-3">
    <span class="pl-4"><a href="{{ route('home') }}">Home</a> > <a href="{{ route('course') }}">All courses</a> > <a href="">Course detail</a></span>
</div>
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="image-course-detail d-flex align-items-center justify-content-center my-4 py-5">
                <img class="img-fluid w-50 py-5" src="/images/logoHTML.png" alt="">
            </div>
            <div class="content-course-detail pt-3">
                <nav class="nav-bar-course mx-4">
                    <div class="nav" id="nav-tab" role="tablist">
                        <a class="nav-link active px-0 py-3 mr-5" id="lessons-tab" data-toggle="tab" href="#lessons" role="tab" aria-controls="lessons" aria-selected="true">Lessons</a>
                        <a class="nav-link px-0 py-3 mx-5" id="teachers-tab" data-toggle="tab" href="#teachers" role="tab" aria-controls="teachers" aria-selected="false">Teachers</a>
                        <a class="nav-link px-0 py-3 mx-5" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                    </div>
                    <hr>
                </nav>
                <div class="tab-content">
                    <div class="container tab-pane fade show active" id="lessons" role="tabpanel" aria-labelledby="lessons-tab">
                        <div class="row">
                            <div class="course-detail-search col-8">
                                <form action="{{ route('course.detail.search', $courseDetail->id)}}" method="get" class="d-flex flex-row p-r">
                                    <input type="text" name="search" placeholder="Search..." class="w-50 form-control my-4 ml-3" @if (isset($keyword)) value="{{ $keyword }}" @endif>
                                    <button type="submit" class="btn icon-search position-relative p-0">
                                        <i class="fa fa-search"></i>
                                    </button>
                                <button type="submit" class="my-4 btn btn-search">Tìm kiếm</button>
                                </form>
                            </div>
                            <div class="col-4 my-4 px-4">
                                @if ($courseDetail->check_user)
                                    <form action="{{ route('leave.course', $courseDetail->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-join-courses px-4">Kết thúc khóa học</button>
                                    </form>
                                @else
                                    <form action="{{ route('take.course', $courseDetail->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-join-courses px-4">Tham gia khóa học</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        <div class="ml-4 pb-3">
                            @foreach ($lessons as $key => $item)
                            <hr>
                            <div class="lesson-list d-flex justify-content-between align-items-center pr-3">
                                {{ ++$key }} . {{ $item->name }}
                                @if($courseDetail->check_user)
                                    @if ($item->check_user_learn)
                                        <a href="{{ route('lesson.detail', $item->id) }}"><button class="btn btn-learned px-4">Learned</button></a>
                                    @else
                                        <form action="{{ route('take.lesson', $item->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-learn px-4 mr-2">Learn</button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                            @endforeach
                            <hr>
                            <div class="pagination-custom d-flex justify-content-end pt-3">
                                {{ $lessons->appends($_GET)->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="container tab-pane fade mx-3 pb-4" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                        <div class="title-teacher my-4 pt-3">Main Teachers</div>
                        <div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-2 p-0 mt-4">
                                        <img class="rounded-circle img-fluid" src="/images/teacher_1.png" alt="">
                                    </div>
                                    <div class="col-8 mt-4 d-flex flex-column justify-content-center">
                                        <div class="teacher-name">Luu Trung Nghia</div>
                                        <div class="teacher-exp">Second Year Teacher</div>
                                        <div class="mt-2">
                                            <i class="logo-google fab fa-google-plus-g"></i>
                                            <i class="logo-facebook fab fa-facebook-f"></i>
                                            <i class="logo-slack fab fa-slack"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="teacher-desc mt-3 mb-5 mr-3">
                                Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique 
                            </div>
                        </div>
                        <div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-2 p-0 mt-4">
                                        <img class="rounded-circle img-fluid" src="/images/teacher_1.png" alt="">
                                    </div>
                                    <div class="col-8 mt-4 d-flex flex-column justify-content-center">
                                        <div class="teacher-name">Luu Trung Nghia</div>
                                        <div class="teacher-exp">Second Year Teacher</div>
                                        <div class="mt-2">
                                            <i class="logo-google fab fa-google-plus-g"></i>
                                            <i class="logo-facebook fab fa-facebook-f"></i>
                                            <i class="logo-slack fab fa-slack"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="teacher-desc mt-3 mb-5 mr-3">
                                Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique 
                            </div>
                        </div>
                        <div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-2 p-0 mt-4">
                                        <img class="rounded-circle img-fluid" src="/images/teacher_1.png" alt="">
                                    </div>
                                    <div class="col-8 mt-4 d-flex flex-column justify-content-center">
                                        <div class="teacher-name">Luu Trung Nghia</div>
                                        <div class="teacher-exp">Second Year Teacher</div>
                                        <div class="mt-2">
                                            <i class="logo-google fab fa-google-plus-g"></i>
                                            <i class="logo-facebook fab fa-facebook-f"></i>
                                            <i class="logo-slack fab fa-slack"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="teacher-desc mt-3 mb-5 mr-3">
                                Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique 
                            </div>
                        </div>
                    </div>
                    <div class="container tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="title-teacher my-4 mx-3 pt-3">
                            {{ $courseDetail->course_review }} Reviews  
                        <hr>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-5">
                                <div class="rating-star d-flex flex-column justify-content-center align-items-center py-4 ml-3 mr-4">
                                    <div class="rating-star-number">{{ $courseDetail->course_review_average }} / 5</div>
                                    <div class="mt-1">
                                        @for ($i = 1; $i <= $rate['five_star']; $i++)
                                            @if ($i <= $courseDetail->course_review_average)
                                                <i class="fas fa-star">&nbsp;</i>
                                            @elseif ($i - 0.5 < $courseDetail->course_review_average)
                                                <i class="fas fa-star-half-alt">&nbsp;</i>
                                            @else
                                                <i class="far fa-star">&nbsp;</i>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="rating-times pb-4 pt-2">{{ $courseDetail->course_review }} Ratings</div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="rating-total">
                                    <div class="d-flex justify-content-between align-items-center m-3">
                                        <div class="rating-total-number">5 stars</div>
                                        <div class="progress w-75 review-bar">
                                            <input type="hidden" id="five-star" value="{{ $courseDetail->getPercentRateCourse($rate['five_star']) + $courseDetail->getPercentRateCourse($rate['four_star_and_half']) }}%">
                                            <div class="progress-bar bg-success" id="five-star-progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="total-stars">{{ $courseDetail->getNumberVote($rate['five_star']) + $courseDetail->getNumberVote($rate['four_star_and_half']) }}</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center m-3">
                                        <div class="rating-total-number">4 stars</div>
                                        <div class="progress w-75 review-bar">
                                            <input type="hidden" id="four-star" value="{{ $courseDetail->getPercentRateCourse($rate['four_star']) + $courseDetail->getPercentRateCourse($rate['three_star_and_half']) }}%">
                                            <div class="progress-bar" id="four-star-progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="total-stars">{{ $courseDetail->getNumberVote($rate['four_star']) + $courseDetail->getNumberVote($rate['three_star_and_half']) }}</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center m-3">
                                        <div class="rating-total-number">3 stars</div>
                                        <div class="progress w-75 review-bar">
                                            <input type="hidden" id="three-star" value="{{ $courseDetail->getPercentRateCourse($rate['three_star']) + $courseDetail->getPercentRateCourse($rate['two_star_and_half']) }}%">
                                            <div class="progress-bar bg-info" id="three-star-progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="total-stars">{{ $courseDetail->getNumberVote($rate['three_star']) + $courseDetail->getNumberVote($rate['two_star_and_half']) }}</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center m-3">
                                        <div class="rating-total-number">2 stars</div>
                                        <div class="progress w-75 review-bar">
                                            <input type="hidden" id="two-star" value="{{ $courseDetail->getPercentRateCourse($rate['two_star']) + $courseDetail->getPercentRateCourse($rate['one_star_and_half']) }}%">
                                            <div class="progress-bar bg-warning" id="two-star-progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="total-stars">{{ $courseDetail->getNumberVote($rate['two_star']) + $courseDetail->getNumberVote($rate['one_star_and_half']) }}</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center m-3">
                                        <div class="rating-total-number">1 stars</div>
                                        <div class="progress w-75 review-bar">
                                            <input type="hidden" id="one-star" value="{{ $courseDetail->getPercentRateCourse($rate['one_star']) + $courseDetail->getPercentRateCourse($rate['half_star']) }}%">
                                            <div class="progress-bar bg-danger" id="one-star-progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="total-stars">{{ $courseDetail->getNumberVote($rate['one_star']) + $courseDetail->getNumberVote($rate['half_star']) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="hapo-review-content mx-3">
                            <div class="hapo-review-text my-4">Show all reviews <i class="fas fa-caret-down"></i></div>
                            @foreach ($courseDetail->reviews as $review)
                            <div class="review-{{ $review->id }}">
                                <div class="hapo-review container" id="list-review">
                                    <div class="hapo-review-user">
                                        <div class="d-flex align-items-center">
                                            <img src="/images/kitten-asleep.png" alt="" class="rounded-circle">
                                            <div class="review-username mx-3">{{ $review->user->name }}</div>
                                            <div class="mr-5">
                                                @for ($i = 1; $i <= $rate['five_star']; $i++)
                                                    @if ($i <= $review->rate)
                                                        <i class="fas fa-star">&nbsp;</i>
                                                    @elseif ($i - 0.5 == $review->rate)
                                                        <i class="fas fa-star-half-alt">&nbsp;</i>
                                                    @else
                                                        <i class="far fa-star">&nbsp;</i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <div class="review-time">{{ $review->created_at }}</div>
                                        </div>
                                    </div>
                                    <div class="review-text mt-3 row">
                                        <div class="col-11 d-flex align-items-center review-content-{{ $review->id }}">
                                            {{ $review->content }}
                                        </div>
                                        @if ($review->user->id == Auth::user()->id)
                                            <div class="col-1">
                                                <button title="Edit message" class="btn edit-modal" data-target="#edit-review-modal" data-toggle="modal" data-content="{{ $review->content }}" data-rate="{{ $review->rate }}" data-url="{{ route('review.update', $review->id) }}">
                                                    <i class="far fa-edit"></i>
                                                </button>
                                                <button title="Delete message" class="btn icon-delete-review delete-modal" data-url="{{ route('review.destroy', $review->id) }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                            </div>
                            @endforeach
                        </div>
                        <div class="m-3">
                            <div class="add-review my-3">Leave a Review</div>
                            <form method="POST" action="{{ route('review.course.store', $courseDetail->id) }}">
                                @csrf
                                <div class="message-add-review my-3">Message</div>
                                <input type="hidden" id="username" value="{{ Auth::user()->name }}">
                                <input type="hidden" name="rating_value" class="rating_value">
                                <input type="hidden" name="course_id" value="{{ $courseDetail->id }}">
                                <textarea name="content" id="content" cols="30" rows="5" class="form-control mb-3"></textarea>
                                <div class="vote-star-review d-flex align-items-center">
                                    <div class="add-review">Vote</div>
                                    <div class="rating pt-2 px-3">
                                        <input class="rate" type="radio" name="rate" id="star10" value="5"><label for="star10">5 stars</label>
                                        <input class="rate" type="radio" name="rate" id="star9" value="4.5"><label for="star9" class="half"></label>
                                        <input class="rate" type="radio" name="rate" id="star8" value="4"><label for="star8">4 stars</label>
                                        <input class="rate" type="radio" name="rate" id="star7" value="3.5"><label for="star7" class="half"></label>
                                        <input class="rate" type="radio" name="rate" id="star6" value="3"><label for="star6">3 stars</label>
                                        <input class="rate" type="radio" name="rate" id="star5" value="2.5"><label for="star5" class="half"></label>
                                        <input class="rate" type="radio" name="rate" id="star4" value="2"><label for="star4">2 stars</label>
                                        <input class="rate" type="radio" name="rate" id="star3" value="1.5"><label for="star3" class="half"></label>
                                        <input class="rate" type="radio" name="rate" id="star2" value="1"><label for="star2">1 stars</label>
                                        <input class="rate" type="radio" name="rate" id="star1" value="0.5"><label for="star1" class="half"></label>
                                    </div>
                                    <div class="message-add-review">(stars)</div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-learn px-4 my-4">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="description-course-detail p-3 my-4">
                <div class="description-title mt-3">
                    Descriptions course
                </div>
                <hr class="underline-description">
                <div class="description-content mb-3">
                    Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique fringilla tempus. Vivamus bibendum nibh in dolor pharetra, a euismod nulla dignissim. Aenean viverra tincidunt nibh, in imperdiet nunc. Suspendisse eu ante pretium, consectetur leo at, congue quam. Nullam hendrerit porta ante vitae tristique.
                </div>
            </div>
            <div class="statistic-course p-3">
                <div class="element py-3">
                    <i class="fa fa-users"></i> Learners : {{ $courseDetail->course_user }}
                </div>
                <hr>
                <div class="element py-3">
                    <i class="far fa-list-alt"></i> Lessons: {{ $courseDetail->number_lesson }} lessons
                </div>
                <hr>
                <div class="element py-3">
                    <i class="fa fa-clock"></i> Time: {{ $courseDetail->time_lesson }} hours
                </div>
                <hr>
                <div class="element py-3">
                    <i class="fa fa-key"></i> Tags: #learn, #code
                </div>
                <hr>
                <div class="element py-3">
                    <i class="far fa-money-bill-alt"></i> Price: {{ $courseDetail->price }} USD
                </div>
            </div>
            <div class="other-courses-element mt-4">
                <div class="title py-3">Other Courses</div>
                <div class="other-courses-list p-3">
                    @foreach ($courseDetail->other_courses as $key => $courses)
                        <a href="{{ route('course.detail', $courses->id) }}">
                            <div class="other-courses-item">
                                {{ ++$key }}. {{ $courses->name }}
                            </div>
                        </a>
                        <hr>
                    @endforeach
                    <div class="d-flex align-items-center justify-content-center py-2">
                        <a href="{{ route('course') }}" class="btn btn-other-courses">View all ours courses</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blank-space"></div>
@include ('reviews.action-review')
@endsection
