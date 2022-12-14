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
                                    <label class="main-content-label mb-0 pt-1">درج تگ</label>
                                    <div class="mr-auto float-right">
                                        <a href="{{route('tags.index')}}" class="btn btn-info"> <i class="fa fa-arrow-right mx-2"></i>برگشت
                                            به لیست</a>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / تگ ها / درج تگ </p>
                                <form action="{{route('tags.store')}}" method="post" class="my-5">
                                    @csrf
                                    <div class="d-flex row ">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="title" class="form-control " placeholder="عنوان "/>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="url" class="form-control "
                                                       placeholder="آدرس  "/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div>
                                            <div class="col-12 ">
                                                <div>
                                                    <label for="editor1">متن اصلی</label>
                                                    <textarea name="topDescription" id="editor1" style="resize: none;">
                                                        ویرایش را شروع کنید
                                                        </textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-5 ckeditor-2 ">
                                                <div>
                                                    <label for="editor2">خلاصه مقاله</label>
                                                    <textarea name="bottomDescription" id="editor2" style="resize: none;">
                                                        ویرایش را شروع کنید
                                                        </textarea>
                                                </div>
                                            </div>
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
                CKEDITOR.replace('editor1');
                CKEDITOR.replace('editor2');
            </script>
@endsection
