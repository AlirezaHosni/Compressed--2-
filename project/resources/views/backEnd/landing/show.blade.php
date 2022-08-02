@extends('backEnd.layouts.master')
@section('master')
    <!-- Main Content-->
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <!--Row-->
                <div class="row row-sm mt-5">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                        <div class="card custom-card">
                            <div class="card-header border-bottom-0 pb-0">
                                <div class="d-flex justify-content-between">
                                    <label class="main-content-label mb-0 pt-1">جزئیات مقاله </label>

                                    <div class="mr-auto float-right">
                                        <a href="{{route('landing.index')}}" class="btn btn-info"> <i class="fa fa-arrow-right mx-2"></i>برگشت به لیست</a>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / مقالات / جزئیات مقاله</p>

                                <h1 class="my-3">{{$landing->title}}</h1>
                                <div class="d-flex">
                                    <p class="mx-2">توسط</p>
                                    <a class="mx-2" href="" style="color: blue;">{{implode(',',$landing->user()->get()->pluck('name')->toArray())}}</a>
                                </div>
                                <hr />
                                <div class="d-flex">
                                    @php $v=\Hekmatinasser\Verta\Facades\Verta::instance($landing->created_at) @endphp
                                    <p class="blog-post-time"><i class="fa fa-clock-o fa-lg left text-warning mx-2"></i> ارسال شده در <span>{{$v->format('%d %B %Y')}}</span> ساعت <span>{{$v->format('H:i')}}</span></p>

                                </div>

                                <hr />

                                <div class="row">
                                    <div class="col-12">
                                        <img src="{{asset('upload/landing/imageFile/'.$landing->imageFile)}}" width="100%" class="mb-3" alt="" />
                                    </div>
                                </div>
                                <hr />
                                <!-- content-article -->
                                <div class="row">
                                    <div class="col-12">
                                        <p>
                                            {{$landing->mainContent}}
                                        </p>
                                    </div>
                                </div>

                                <!-- content-article -->
                                <!-- category article -->
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <h4>دسته بندی های بلاگ</h4>
                                        <hr />
                                        @foreach($data as $row)
                                            <a href="" style="color: blue;">{{$row->title}}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- category article -->
                            </div>
                        </div>
                    </div>
                    <!-- COL END -->
                </div>
                <!-- row closed  -->
            </div>
        </div>
    </div>
    <!-- End Main Content-->

@endsection
