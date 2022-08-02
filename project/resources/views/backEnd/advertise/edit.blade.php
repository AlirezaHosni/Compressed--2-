@extends('backEnd.layouts.master')
@section('master')
    <!-- Main Content-->
    <div class="main-content side-content pt-0 create-article-row">
        <div class="container-fluid">
            <div class="inner-body">
                <!--Row-->
                <div class="row row-sm mt-5 ">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                        <div class="card custom-card">
                            <div class="card-header border-bottom-0 pb-0">
                                <div class="d-flex justify-content-between">
                                    <label class="main-content-label mb-0 pt-1">ویرایش  تبلیغات</label>
                                    <div class="mr-auto float-right">
                                        <a href="{{route('advertise.index')}}" class="btn btn-info"> <i class="fa fa-arrow-right mx-2"></i>برگشت به لیست</a>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2"> مدیریت / تبلیغات/  ویرایش تبلیغات </p>
                                <form action="{{route('advertise.update',$advertise->id)}}" method="post" enctype="multipart/form-data" class="my-5">
                                    @csrf
                                    @method('PUT')
                                    <div class="d-flex row ">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="title" class="form-control " placeholder="عنوان " value="{{$advertise->title}}" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="advertiseTitle" class="form-control meta-keyboard" placeholder="عنوان تبلیغ " value="{{$advertise->advertiseTitle}}" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="imageAlt" class="form-control meta-keyboard" placeholder=" تگ آلت " value="{{$advertise->imageAlt}}" />
                                            </div>
                                            <div class="d-flex align-items-center  mt-5">
                                                <h6>   باز شدن در پنجره جدید </h6>
                                                <label class="switch mx-2">
                                                    <input name="isBlank" value="1" class="mycheckbox" type="checkbox">
                                                    <div class="myslider"></div>
                                                </label>
                                                <h6 class="mr-3"> ret follow </h6>
                                                <label class="switch mx-2">
                                                    <input name="isFollow" value="true" class="mycheckbox" type="checkbox">
                                                    <div class="myslider"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="systemName" class="form-control tag-img-main" placeholder=" نام سیستمی   " value="{{$advertise->systemName}}" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="url" class="form-control "
                                                       placeholder="آدرس" value="{{$advertise->url}}" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- drag and drop -->
                                    <div class="row justify-content-center  mb-5">
                                        <div class="col-10 mt-5">
                                            <p> عکس</p>
                                        </div>
                                        <div class="drop-zone col-10">
                                            <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                            <input type="file" name="image" id="drag1" class="drop-zone__input">
                                        </div>
                                    </div>
                                    <div style="padding-right: 67px;"><span>عکس قبلی:</span><img src="{{asset('upload/advertise/'.$advertise->image)}}"  width="60px" height="60px"></div>
                                    <!-- end drag and drop -->
                                    <div class="col text-left">
                                        <button type="submit" class="btn btn-info">
                                            ذخیره
                                        </button>
                                    </div>
                                </form>
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
