@extends('backEnd.layouts.master')
@section('master')
    <!-- Main Content-->
    <div class="main-content side-content pt-0">
        <div>
            <div class="inner-body">
                <!-- Row -->
                <div class=" square mt-5">
                    <div class="col-lg-12">
                        <div class="card custom-card ">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4 col-xl-4 p-1">
                                        <div class="card custom-card">
                                            <div class="user-card text-center">
                                                <div class="  online text-center ">
                                                    <img alt="آواتار" class="rounded-circle edituser-img"
                                                         src="{{asset('upload/users/'.$user->image)}}">
                                                </div>
                                                <div class="mt-2">
                                                    <form action="{{route('editImage',$user->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                    <button type="submit" class="btn btn-warning my-3 py-2 px-4">تغییر عکس</button>
                                                    <div class="input-group mb-3">
                                                        <input type="file" name="image" class="form-control" id="inputGroupFile01">
                                                        </form>

                                                        <hr>

                                                    </div>
                                                    <div class="d-flex justify-content-between mt-3">
                                                        <p>نام: </p>
                                                        <p>{{$user->name}}</p>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        @if($user->phone === null)
                                                            <p>تلفن ثابت: </p>
                                                            <p>ثبت نشده</p>
                                                        @else
                                                            <p>تلفن ثابت: </p>
                                                            <p>{{$user->phone}}</p>
                                                        @endif
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        @if($user->phoneNumber === null)
                                                            <p>تلفن ثابت: </p>
                                                            <p>ثبت نشده</p>
                                                        @else
                                                            <p>موبایل: </p>
                                                            <p>{{$user->phoneNumber}}</p>
                                                        @endif
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        @if($user->nationalCode === null)
                                                            <p>کدملی: </p>
                                                            <p>ثبت نشده</p>
                                                        @else
                                                            <p>کدملی: </p>
                                                            <p>{{$user->nationalCode}}</p>
                                                        @endif
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <p> ایمیل:</p>
                                                        <p>{{$user->email}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8">
                                        <div class="profile-tab tab-menu-heading">
                                            <nav class="nav main-nav-line p-3 tabs-menu profile-nav-line bg-gray-100">
                                                <a class="nav-link" data-toggle="tab" href="#about">درباره </a>
                                                <a class="nav-link active " data-toggle="tab" href="#edit">ویرایش کاربر </a>
                                            </nav>
                                        </div>
                                        <div class="card custom-card main-content-body-profile">
                                            <div class="tab-content">
                                                <div class="main-content-body tab-pane p-4 border-top-0 "
                                                     id="about">
                                                    <div class="card-body p-0 border p-0 rounded-10">
                                                        <div class="p-4">
                                                            <h4 class="tx-15 text-uppercase mb-3">بیوگرافی</h4>
                                                            <p class="m-b-5">لورم ایپسوم متن ساختگی با تولید سادگی
                                                                نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                                                چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                                                که لازم است </p>
                                                        </div>
                                                        <div class="p-4">
                                                            <!-- create Session  -->
                                                            @if(session('updateUser'))
                                                                <div
                                                                    class="alert alert-success alert-dismissible fade show mt-3"
                                                                    role="alert">
                                                                    <strong>{{session('updateUser')}}</strong>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="alert" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="border-top"></div>
                                                        <div class="border-top"></div>
                                                    </div>
                                                </div>
                                                <div class="main-content-body tab-pane p-4 active border-top-0" id="edit">
                                                      <!--  Errors  -->
                                                     @if($errors->any())
                                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            @foreach($errors->all() as $key=>$item)
                                                            <ul>
                                                                <li style="list-style: none">{{++$key}}-{{$item}}</li>
                                                            </ul>
                                                            @endforeach
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                     @endif
                                                      <!--  End Errors  -->
                                                    <!-- create Session  -->
                                                    @if(session('updateUser'))
                                                        <div
                                                            class="alert alert-success alert-dismissible fade show mt-3"
                                                            role="alert">
                                                            <strong>{{session('updateUser')}}</strong>
                                                            <button type="button" class="close"
                                                                    data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    @endif
                                                    <div class="card-body border">
                                                        <div class="mb-4 main-content-label">اطلاعات کاربر</div>
                                                        <form class="form-horizontal"
                                                              action="{{route('userManagement.update',$user->id)}}"
                                                              method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="mb-4 main-content-label"></div>
                                                            <div class="form-group ">
                                                                <div class="row row-sm">
                                                                    <div class="col-md-3">
                                                                        <label class="form-label">نام کاربری</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="text" name="name"
                                                                               class="form-control "
                                                                               placeholder="نام کاربری"
                                                                               value="{{$user->name}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row row-sm">
                                                                    <div class="col-md-3">
                                                                        <label class="form-label">نام </label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="text" name="firstName"
                                                                               class="form-control"
                                                                               placeholder="نام کوچک"
                                                                               value="{{$user->firstName}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row row-sm">
                                                                    <div class="col-md-3">
                                                                        <label class="form-label">نام خانوادگی</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="text" name="lastName"
                                                                               class="form-control"
                                                                               placeholder="نام خانوادگی"
                                                                               value="{{$user->lastName}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row row-sm">
                                                                    <div class="col-md-3">
                                                                        <label class="form-label"> کد ملی</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="text" name="nationalCode"
                                                                               class="form-control"
                                                                               placeholder=" کد ملی"
                                                                               value="{{$user->nationalCode}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row row-sm">
                                                                    <div class="col-md-3">
                                                                        <label class="form-label"> شماره ثابت</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="text" name="phone"
                                                                               class="form-control"
                                                                               placeholder=" شماره ثابت "
                                                                               value="{{$user->phone}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row row-sm">
                                                                    <div class="col-md-3">
                                                                        <label class="form-label">ایمیل <i>(الزامی)</i>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="text" name="email"
                                                                               class="form-control"
                                                                               placeholder="پست الکترونیک"
                                                                               @if($user->email === null) value="info@Spruha.in"
                                                                               @else value="{{$user->email}}" @endif >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row row-sm">
                                                                    <div class="col-md-3">
                                                                        <label class="form-label"> شماره همراه</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="text" name="phoneNumber"
                                                                               class="form-control"
                                                                               placeholder=" شماره همراه "
                                                                               value="{{$user->phoneNumber}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row row-sm">
                                                                    <div class="col-md-3">
                                                                        <label class="form-label"> تعیین نقش</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <select name="role" class="form-control"
                                                                                id="role">
                                                                            @foreach($roles as $role)
                                                                                <option
                                                                                    value="{{$role->id}}">{{$role->name}} </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <input class="form-check-input" type="checkbox"
                                                                       name="permission" value="{{$permission->id}}"
                                                                       id="defaultCheck1">
                                                                <label class="form-check-label mr-3"
                                                                       for="defaultCheck1">
                                                                    تحلیلگر
                                                                </label>
                                                            </div>
                                                            <div>
                                                                @if($user->active === 0)
                                                                    <input class="form-check-input" type="checkbox"
                                                                           value="1" name="active" id="defaultCheck1"
                                                                           style="margin-left: 50px;">
                                                                @else
                                                                    <input class="form-check-input" value="1"
                                                                           type="checkbox" name="active"
                                                                           id="defaultCheck1" style="margin-left: 50px;"
                                                                           checked>
                                                                @endif
                                                                <label class="form-check-label mr-3"
                                                                       for="defaultCheck1">
                                                                    وضعیت
                                                                </label>
                                                            </div>


                                                            <div class="mt-3">
                                                                <button type="submit" class="btn btn-warning mr-1">ذخیره
                                                                    کردن
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Row -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.alert-success').fadeOut(250);

        });
    </script>
@endsection
