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
                                    <label class="main-content-label mb-0 pt-1">درج لندینگ</label>
                                    <div class="mr-auto float-right">
                                        <a href="{{route('landing.index')}}" class="btn btn-info"> <i class="fa fa-arrow-right mx-2"></i>برگشت به لیست</a>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / درج لندینگ </p>
                                <form action="{{route('landing.store')}}" method="post" enctype="multipart/form-data" class="my-5">
                                    @csrf
                                    <div class="d-flex row ">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="title" class="form-control " placeholder="عنوان مقاله" />
                                            </div>
                                            <div class="form-group">
{{--                                                <input class="form-control" name="publishDate" placeholder="تاریخ انتشار" type="text" data-jdp />--}}
                                                <input type="text" name="publishDate" id="publishDate" class="form-control form-control-sm d-none">
                                                <input type="text" id="publishDate_view" class="form-control form-control-sm">
                                            </div>
                                            <div class="form-group">
                                                <label for="addres-article" class="addres-article my-2">آدرس مقاله </label>
                                                <input type="text" id="addres-article" name="url" class="form-control addres-article-input text-left"
                                                       value="4120" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control " name="link" placeholder="لینک " />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control meta-keyboard" name="metaKeyWords" placeholder="متا کیوورد" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1" class=" my-2">نام نویسنده</label>
                                                <select class="form-control  select-role-search-form " placeholder="ds"
                                                        style="font-size: large;" id="exampleFormControlSelect1" name="user_id">
                                                    @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="titleTwo" class="form-control down-title-blog-create"
                                                       placeholder="زیر عنوان مقاله" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="imageAlt" class="form-control tag-img-main" placeholder=" تگ آلت عکس اصلی" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="source" class="form-control" placeholder="منبع" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="chart" class="form-control down-title-blog-create" placeholder="  نمودار" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="metaKeyDescription" class="form-control meta-discription" placeholder="متا دیسکریپشن" />
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width: 80%;">
                                        <label for="addres-article" class="addres-article my-2">تگ ها </label>
                                        <select class="js-example-basic-multiple" name="tag[]" multiple="multiple" style="width: 100%;">
                                         @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div style="width: 80%;margin-top: 20px">
                                        <label for="addres-article" class="addres-article my-2">گروه مقاله </label>
                                        <select class="js-example-basic-single" name="ArticleGroup_id" style="width: 100%;">
                                            @foreach($articleGroup as $item)
                                                <option value="{{$item->id}}">{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                <!-- drag and drop -->
                                <div class="row justify-content-center  mb-5">
                                    <div class="col-10 mt-5">
                                        <p>عکس پس زمینه</p>
                                    </div>
                                    <div class="drop-zone col-10">
                                        <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                        <input type="file" name="imageBackground" id="drag1" class="drop-zone__input">
                                    </div>
                                </div>
                                <div class="row justify-content-center  mb-5">
                                    <div class="col-10 mt-5">
                                        <p>عکس اصلی</p>
                                    </div>
                                    <div class="drop-zone col-10">
                                        <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                        <input type="file" name="imageFile" id="drag1" class="drop-zone__input">
                                    </div>
                                </div>
                                <!-- end drag and drop -->
                                <div class="row">

                                        <div class="col-12 ">
                                            <div>
                                                <label for="editor1">متن اصلی</label>
                                                <textarea name="mainContent" id="editor1" style="resize: none;">

                                                    </textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-5 ckeditor-2 ">
                                            <div>
                                                <label for="editor2">خلاصه مقاله</label>
                                                <textarea name="summary" id="editor2" style="resize: none;">

                                                    </textarea>
                                            </div>
                                        </div>
                                        <div class="col text-left my-5">
                                            <button type="submit" class="btn btn-info">
                                                ذخیره
                                            </button>
                                        </div>
                                    </form>
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
@section('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
            $('.js-example-basic-single').select2();
        });
    </script>
    <script>
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        // jalaliDatepicker.startWatch();
    </script>
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
