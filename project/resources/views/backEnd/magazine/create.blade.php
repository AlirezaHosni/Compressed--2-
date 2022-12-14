@extends('backEnd.layouts.master')
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('backEnd/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection
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
                                    <label class="main-content-label mb-0 pt-1">درج مجله</label>
                                    <div class="mr-auto float-right">
                                        <a href="{{route('magazine.index')}}" class="btn btn-info"> <i class="fa fa-arrow-right mx-2"></i>برگشت به
                                            لیست</a>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / درج مجله </p>
                                <form action="{{route('magazine.store')}}" method="post" enctype="multipart/form-data" class="my-5">
                                    @csrf
                                    <div class="d-flex row ">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="title" class="form-control " placeholder="عنوان مجله" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <div class="form-group">
{{--                                                    <input class="form-control" name="publishDate" placeholder="تاریخ انتشار" type="text" data-jdp />--}}
                                                    <input type="text" name="publishDate" id="publishDate" class="form-control form-control-sm d-none">
                                                    <input type="text" id="publishDate_view" class="form-control form-control-sm">
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
                                                <input type="text" name="contentTitle[]" class="form-control " placeholder="سر فصل ها" />
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
                                    <div class="row justify-content-center  mb-5">
                                        <div class="col-10 mt-5">
                                            <p> فایل</p>
                                        </div>
                                        <div class="drop-zone col-10">
                                            <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                            <input type="file" name="file" id="drag1" class="drop-zone__input">
                                        </div>
                                    </div>
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
{{--            <script>--}}
{{--                    jalaliDatepicker.startWatch();--}}
{{--            </script>--}}
            <script src="{{ asset('backEnd/jalalidatepicker/persian-date.min.js') }}"></script>
            <script src="{{ asset('backEnd/jalalidatepicker/persian-datepicker.min.js') }}"></script>
            <script>
                $(document).ready(function() {
                    $('#publishDate_view').persianDatepicker({
                        format: 'YYYY/MM/DD',
                        altField: '#publishDate',
                        timePicker: {
                            enabled: true,
                            meridiem: {
                                enabled: true
                            }
                        }
                    })
                });
            </script>
@endsection
