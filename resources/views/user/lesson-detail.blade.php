@extends('layouts.app')
@section('title')
    Lesson
@endsection
@section('content')
<div class="header-course-detail container-fluid py-3">
    <span class="pl-4"><a href="{{ route('home') }}">Home</a> > <a href="{{ route('course') }}">All courses</a> > <a href="{{ route('course.detail', $lesson->course_id) }}">Course detail</a> > <a href="{{ route('lesson.detail', $lesson->id) }}">Lesson detail</a></span>
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
                        <a class="nav-link active px-0 py-3 mr-5" id="descriptions-tab" data-toggle="tab" href="#descriptions" role="tab" aria-controls="descriptions" aria-selected="true">Descriptions</a>
                        <a class="nav-link px-0 py-3 mx-5" id="teachers-tab" data-toggle="tab" href="#teachers" role="tab" aria-controls="teachers" aria-selected="false">Teachers</a>
                        <a class="nav-link px-0 py-3 mx-5" id="program-tab" data-toggle="tab" href="#program" role="tab" aria-controls="program" aria-selected="false">Program</a>
                        <a class="nav-link px-0 py-3 mx-5" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
                    </div>
                    <hr>
                </nav>
                <div class="tab-content">
                    <div class="container tab-pane fade show active pb-5" id="descriptions" role="tabpanel" aria-labelledby="descriptions-tab">
                        <div class="title-teacher my-4 mx-3 pt-3">
                            Descriptions lesson
                        </div>
                        <div class="teacher-desc mx-3">{{ $lesson->description }}</div>
                        <div class="title-teacher my-4 mx-3 pt-3">
                            Requirements
                        </div>
                        <div class="teacher-desc mx-3">{{ $lesson->requirement }}</div>
                        <div class="tag mx-3 mt-4">
                            <span>Tag:</span>
                            <a href="" class="btn btn-tag mx-2">#learn</a>
                            <a href="" class="btn btn-tag mx-2">#html</a>
                            <a href="" class="btn btn-tag mx-2">#css</a>
                            <a href="" class="btn btn-tag mx-2">#coder</a>
                            <a href="" class="btn btn-tag mx-2">#developer</a>
                            <a href="" class="btn btn-tag mx-2">#js</a>
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
                                Main Mentor!
                            </div>
                        </div>
                    </div>
                    <div class="container tab-pane fade pb-4" id="program" role="tabpanel" aria-labelledby="program-tab">
                        <div class="title-teacher my-4 mx-3 pt-3">
                            Program
                        </div>
                        <hr>
                        <div class="program-list d-flex align-items-center pr-3">
                            <div class="program-type col-2"><i class="far fa-file-word mr-2"></i>Lesson</div>
                            <div class="program-action col-8">Program learn HTML/CSS</div>
                            <div class="col-2">
                                <a href=""><button class="btn btn-learn px-4">Preview</button></a>
                            </div>
                        </div>
                        <hr>
                        <div class="program-list d-flex align-items-center pr-3">
                            <div class="program-type col-2"><i class="far fa-file-pdf mr-2"></i>PDF</div>
                            <div class="program-action col-8">Download course slides</div>
                            <div class="col-2">
                                <a href=""><button class="btn btn-learn px-4">Preview</button></a>
                            </div>
                        </div>
                        <hr>
                        <div class="program-list d-flex align-items-center pr-3">
                            <div class="program-type col-2"><i class="far fa-file-video mr-2"></i>Video</div>
                            <div class="program-action col-8">Download course videos</div>
                            <div class="col-2">
                                <a href=""><button class="btn btn-learn px-4">Preview</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="container tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="title-teacher my-4 mx-3 pt-3">
                            05 Reviews
                        <hr>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-5">
                                <div class="rating-star d-flex flex-column justify-content-center align-items-center py-4 ml-3 mr-4">
                                    <div class="rating-star-number">5</div>
                                    <div class="mt-1">
                                        <i class="fas fa-star">&nbsp;</i>
                                        <i class="fas fa-star">&nbsp;</i>
                                        <i class="fas fa-star">&nbsp;</i>
                                        <i class="fas fa-star">&nbsp;</i>
                                        <i class="fas fa-star">&nbsp;</i>
                                    </div>
                                    <div class="rating-times pb-4">2 Ratings</div>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="rating-total">
                                    <div class="d-flex justify-content-between align-items-center m-3">
                                        <div class="rating-total-number">5 stars</div>
                                        <div class="progress w-75 review-bar">
                                            <div class="progress-bar w-75 bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        <div class="total-stars">5</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center m-3">
                                        <div class="rating-total-number">4 stars</div>
                                        <div class="progress w-75 review-bar">
                                            <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        <div class="total-stars">5</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center m-3">
                                        <div class="rating-total-number">3 stars</div>
                                        <div class="progress w-75 review-bar">
                                            <div class="progress-bar w-75 bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        <div class="total-stars">5</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center m-3">
                                        <div class="rating-total-number">2 stars</div>
                                        <div class="progress w-75 review-bar">
                                            <div class="progress-bar w-75 bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        <div class="total-stars">5</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center m-3">
                                        <div class="rating-total-number">1 stars</div>
                                        <div class="progress w-75 review-bar">
                                            <div class="progress-bar w-75 bg-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        <div class="total-stars">5</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="hapo-review-content mx-3">
                            <div class="hapo-review-text my-4">Show all reviews <i class="fas fa-caret-down"></i></div>
                            <div class="hapo-review">
                                <div class="hapo-review-user">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/kitten-asleep.png" alt="" class="rounded-circle">
                                        <div class="review-username mx-3">Nam Hoang</div>
                                        <div class="mr-5">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="review-time">August 4, 2020 at 1:30 pm</div>
                                    </div>
                                </div>
                                <div class="review-text mt-3">
                                    Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique 
                                </div>
                            </div>
                            <hr>
                            <div class="hapo-review">
                                <div class="hapo-review-user">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/kitten-asleep.png" alt="" class="rounded-circle">
                                        <div class="review-username mx-3">Nam Hoang</div>
                                        <div class="mr-5">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="review-time">August 4, 2020 at 1:30 pm</div>
                                    </div>
                                </div>
                                <div class="review-text mt-3">
                                    Vivamus volutpat eros pulvinar velit laoreet, sit amet egestas erat dignissim. Sed quis rutrum tellus, sit amet viverra felis. Cras sagittis sem sit amet urna feugiat rutrum. Nam nulla ipsum, venenatis malesuada felis quis, ultricies convallis neque. Pellentesque tristique 
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="m-3">
                            <div class="add-review my-3">Leave a Review</div>
                            <div class="message-add-review my-3">Message</div>
                            <textarea name="comment" id="" cols="30" rows="5" class="form-control mb-3"></textarea>
                            <div class="vote-star-review d-flex align-items-center">
                                <div class="add-review">Vote</div>
                                <div class="rating pt-2 px-3">
                                    <input type="radio" name="rate" id="star1" value="1"><label for="star1">1 stars</label>
                                    <input type="radio" name="rate" id="star2" value="2"><label for="star2">2 stars</label>
                                    <input type="radio" name="rate" id="star3" value="3"><label for="star3">3 stars</label>
                                    <input type="radio" name="rate" id="star4" value="4"><label for="star4">4 stars</label>
                                    <input type="radio" name="rate" id="star5" value="5"><label for="star5">5 stars</label>
                                </div>
                                <div class="message-add-review">(stars)</div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-learn px-4 my-4">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="statistic-course p-3 my-4">
                <div class="element py-3">
                    <i class="fas fa-desktop"></i> Course: {{ $lesson->course->name }}
                </div>
                <hr>
                <div class="element py-3">
                    <i class="fa fa-users"></i> Learners : {{ $lesson->lesson_user }}
                </div>
                <hr>
                <div class="element py-3">
                    <i class="fa fa-clock"></i> Time: {{ $lesson->time }} hours
                </div>
                <hr>
                <div class="element py-3">
                    <i class="fa fa-key"></i> Tags: #learn, #code
                </div>
                <hr>
                <div class="element py-3">
                    <i class="far fa-money-bill-alt"></i> Price: {{ $lesson->course->price }} USD
                </div>
                <hr>
                <div class="d-flex align-items-center justify-content-center py-2">
                    <form action="{{ route('leave.course', $lesson->course->id) }}" method="post">
                        @csrf
                        <button class="btn btn-join-courses px-4">Kết thúc khóa học</button>
                    </form>
                </div>
            </div>
            <div class="other-courses-element mt-4">
                <div class="title py-3">Other Courses</div>
                <div class="other-courses-list p-3">
                    @foreach ($lesson->course->other_course as $key => $courses)
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
@endsection
