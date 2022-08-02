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
                                    <label class="main-content-label mb-0 pt-1"> تبلیغات</label>
                                    <div class="mr-auto float-right">
                                        <a href="{{route('advertise.create')}}" class="btn btn-danger">ایجاد تبلیغ +</a>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / تبلیغات</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive border userlist-table">
                                    <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                        <thead>
                                        <tr>
                                            <th class="wd-lg-8p"><span> عنوان</span></th>

                                            <th class="wd-lg-8p"><span> عنوان تبلیغ</span></th>

                                            <th class="wd-lg-20p"><span> نام سیستمی</span></th>

                                            <th class="wd-lg-20p">عمل</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($advertise as $key=>$item)
                                            <tr>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->advertiseTitle}}</td>
                                                <td>{{$item->systemName}}</td>
                                                <td>
                                                    <a href="{{route('advertise.edit',$item->id)}}" class="btn btn-info">
                                                        <i class="fe fe-edit-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

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
