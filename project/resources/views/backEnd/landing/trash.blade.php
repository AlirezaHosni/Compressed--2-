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
                                    <label class="main-content-label mb-0 pt-1">مقالات حذف شده </label>

                                    <div class="mr-auto float-right">
                                        <a href="{{route('landing.index')}}" class="btn btn-info"> <i class="fa fa-arrow-right mx-2"></i>برگشت به لیست</a>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / مقالات حذف شده</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive border userlist-table">
                                    <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                        <thead>
                                        <tr>
                                            <th class="wd-lg-8p"><span> ردیف</span></th>

                                            <th class="wd-lg-8p"><span>عنوان مقاله</span></th>

                                            <th class="wd-lg-20p"><span>تاریخ درج</span></th>
                                            <th class="wd-lg-20p"><span>تاریخ انتشار</span></th>
                                            <th class="wd-lg-20p"><span>وضعیت انتشار</span></th>

                                            <th class="wd-lg-20p">عمل</th>
                                        </tr>
                                        </thead>
                                        @foreach($landing as $key=>$item)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$item->title}}</td>
                                                <td>{{\Hekmatinasser\Verta\Facades\Verta::instance($item->created_at)->format('Y/m/d')}}</td>
                                                <td>{{Carbon\Carbon::create($item->publishDate)->format('Y/m/d')}}</td>
                                                <td><i class="fa fa-close text-danger fs-1"></i>
                                                    <span class="label text-muted d-flex"></span>
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <form action="{{route('restoreLanding',$item->id)}}" method="post">
                                                        @csrf
                                                        <button class="btn btn-success ml-1"><i class="fe fe-clock"></i></button>
                                                    </form>
                                                    <form action="{{route('destroyLanding',$item->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger ml-1"><i class="fe fe-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <ul class="pagination mt-4 mb-0 float-left">
                                    <li class="page-item page-prev disabled">
                                        <a class="page-link" href="#" tabindex="-1">قبلی</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                    <li class="page-item page-next">
                                        <a class="page-link" href="#">بعد</a>
                                    </li>
                                </ul>
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
