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
                                    <label class="main-content-label mb-0 pt-1">ویرایش  مجله</label>
                                    <div class="mr-auto float-right">
                                        <a href="{{route('magazine.index')}}" class="btn btn-info"> <i class="fa fa-arrow-right mx-2"></i>برگشت به
                                            لیست</a>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / ویرایش مجله </p>
                                <form action="{{route('magazine.update',$magazine->id)}}" method="post" enctype="multipart/form-data" class="my-5">
                                    @csrf
                                    @method('put')
                                    <div class="d-flex row ">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="title" class="form-control " placeholder="عنوان مجله" value="{{$magazine->title}}" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <input class="form-control" name="publishDate" placeholder="تاریخ انتشار" type="text" data-jdp value="{{Carbon\Carbon::create($magazine->publishDate)->format('Y/m/d')}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" col ">
                                            <div class=" text-center alert-create-mag py-3">
                                                <h6 class="text-light">
                                                    هر سرفصل را با "," مجزا کنید
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 mt-4">
                                            <div class="form-group">
                                                <input type="text" name="contentTitle[]" class="form-control " placeholder="سر فصل ها" value="{{$magazine->contentTitle}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- drag and drop -->
                                    <div class="row justify-content-center  mb-5">
                                        <div class="col-10 mt-2">
                                            <p> پوستر </p>
                                        </div>
                                        <div class="drop-zone col-10">
                                            <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                            <input type="file" name="imageFile" id="drag1" class="drop-zone__input">
                                        </div>
                                    </div>
                                    <div style="padding-right: 67px;"><span>عکس قبلی:</span><img src="{{asset('upload/magazine/imageFile/'.$magazine->imageFile)}}"  width="60px" height="60px"></div>
                                    <div class="row justify-content-center  mb-5">
                                        <div class="col-10 mt-5">
                                            <p> فایل</p>
                                        </div>
                                        <div class="drop-zone col-10">
                                            <span class="drop-zone__prompt">Drop file here or click to upload</span>

                                            <input type="file" name="file" id="drag1" class="drop-zone__input">

                                        </div>
                                    </div>
                                    <div style="padding-right: 67px;"><span>فایل قبلی:</span><a  href="{{asset('upload/magazine/file/'.$magazine->file)}}">{{$magazine->file}}</a></div>
                                    <!-- end drag and drop -->
                                    <div class="col text-left">
                                        <button type="submit" class="btn btn-info mb-3">
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
        @section('js')
            <script>
                jalaliDatepicker.startWatch();
            </script>
@endsection
