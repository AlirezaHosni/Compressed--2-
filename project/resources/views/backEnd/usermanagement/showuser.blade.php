@extends('backEnd.layouts.master')
@section('master')
    <!-- Main Content-->
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <!-- Row -->
                <div class="row row-sm mt-2">
                    <div class="col-sm-6 col-md-6 col-xl-3 p-1" style="margin: 0 auto;">
                        <div class="card custom-card">
                            <div class="card-body user-card text-center">
                                <div class="main-img-user avatar-lg online text-center">
                                    <img alt="آواتار" class="rounded-circle" src="assets/img/users/5.jpg" />
                                </div>
                                <div class="mt-2">
                                    <h5 class="mb-1">{{$user->name}}</h5>
                                    <div class="d-flex justify-content-between mt-3">
                                        <p>شماره همراه:</p>
                                        <p>{{$user->phoneNumber}}</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>ایمیل:</p>
                                        <p>{{$user->email}}</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>تاریخ ثبت نام:</p>
                                        <p>{{$user->created_at}}</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>نقش</p>
                                        <p>{{implode(',',$user->roles()->get()->pluck('name')->toArray())}}</p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        @if($user->active === 0)
                                        <p>وضعیت:</p>
                                        <span class="text-muted"><i class="far fa-times-circle text-danger ml-1"></i>تأیید نشده</span>
                                        @elseif($user->active === 1)
                                            <p>وضعیت:</p>
                                            <span class="text-muted"><i class="far fa-check-circle text-success ml-1"></i>تأیید شده</span>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p>تایید ایمیل:</p>
                                        <span class="text-muted"><i class="far fa-check-circle text-success ml-1"></i>تأیید شده</span>
                                    </div>

                                    {{--<div class="d-flex justify-content-between">
                                        <p>تایید شماره همراه:</p>
                                        <span class="text-muted"><i class="far fa-times-circle text-danger ml-1"></i>تأیید شده</span>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
