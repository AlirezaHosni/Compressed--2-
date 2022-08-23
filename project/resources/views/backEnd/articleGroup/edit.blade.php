
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
                                    <label class="main-content-label mb-0 pt-1">ویرایش گروه مقاله</label>
                                    <div class="mr-auto float-right">
                                        <a href="{{route('articleGroup.index')}}" class="btn btn-info"> <i class="fa fa-arrow-right mx-2"></i>برگشت به لیست</a>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / گروه مقالات / ویرایش گروه مقاله </p>
                                <form action="{{route('articleGroup.update',$data->id)}}" method="post" class="my-5">
                                    @csrf
                                    @method('put')
                                    <div class="d-flex row ">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="title" class="form-control " placeholder="عنوان " value="{{$data->title}}" />
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1" class=" my-2"> عنوان والد</label>
                                                <select class="form-control  select-role-search-form " name="parent_id" placeholder="ds"
                                                        style="font-size: large;" id="exampleFormControlSelect1">
                                                    <option value="">بدون والد</option>
                                                    @foreach($articleGroups as $item)
                                                        <option value="{{$item->id}}" @if($item->id == old('parent_id', $data->parent_id)) selected @endif>{{$item->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="url" class="form-control "
                                                       placeholder="آدرس" value="{{$data->url}}" />
                                            </div>
                                            <div class="d-flex align-items-center mt-5">
                                                <h6> ویژه اخبار کوتاه </h6>
                                                <label class="switch mx-2">
                                                    <input class="mycheckbox " name="shortNews" value="1" type="checkbox">
                                                    <div class="myslider"></div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
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
