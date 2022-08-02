
@extends('backEnd.layouts.master')
@section('master')
    <div class="main-content side-content pt-0 create-article-row">
        <div class="container-fluid">
            <div class="inner-body">
                <!--Row-->
                <div class="row row-sm mt-5 ">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                        <div class="card custom-card">
                            <div class="card-header border-bottom-0 pb-0">
                                <div class="d-flex justify-content-between">
                                    <label class="main-content-label mb-0 pt-1">درج لینک منو</label>
                                    <div class="mr-auto float-right">
                                        <a href="{{route('menus.index')}}" class="btn btn-info"> <i class="fa fa-arrow-right mx-2"></i>برگشت به لیست</a>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت /  مدیریت / درج لینک منو </p>
                                <form action="{{route('menus.store')}}" method="post" enctype="multipart/form-data" class="my-5">
                                    @csrf
                                    <div class="d-flex row ">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="title" class="form-control " placeholder="عنوان " />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="priority"  class="form-control meta-keyboard" placeholder="اولویت " />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1" class=" my-2"> والد</label>
                                                <select class="form-control   select-role-search-form " name="parent_id" placeholder="ds"
                                                        style="font-size: large;" id="exampleFormControlSelect1">
                                                   @if(!empty($menu))
                                                        <option value="">بدون والد</option>
                                                       @foreach($menu as $row)
                                                            <option value="{{$row->title}}">{{$row->title}}</option>

                                                        @endforeach
                                                    @else

                                                    @endif
                                                </select>
                                            </div>
                                            <div class="d-flex align-items-center  mt-5">
                                                <h6>   باز شدن در پنجره جدید </h6>
                                                <label class="switch mx-2">
                                                    <input class="mycheckbox" type="checkbox">
                                                    <div class="myslider"></div>
                                                </label>
                                                <h6 class="mr-3"> ret follow </h6>
                                                <label class="switch mx-2">
                                                    <input class="mycheckbox" type="checkbox">
                                                    <div class="myslider"></div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="url" class="form-control "
                                                       placeholder="آدرس" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="imageAlt" class="form-control tag-img-main" placeholder=" تگ آلت  " />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="symbol" class="form-control" placeholder="کلاس نماد" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- drag and drop -->
                                    <div class="row justify-content-center  mb-5">
                                        <div class="col-10 mt-5">
                                            <p> تصویر</p>
                                        </div>
                                        <div class="drop-zone col-10">
                                            <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                            <input type="file" name="image" id="drag1" class="drop-zone__input">
                                            <input type="hidden" name="subMenu_id" value="{{$submenu}}">
                                        </div>
                                    </div>
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
