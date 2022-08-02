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
                                    <label class="main-content-label mb-0 pt-1">مجلات </label>
                                    <div class="mr-auto float-right">
                                        <div class="mr-auto float-right">
                                            <a href="{{route('magazine.create')}}" class="btn btn-success">درج مجله +</a>
                                        </div>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / مجلات</p>
                            </div>
                            <!-- create Session  -->
                            @if(session('delete'))
                                <div class="alert alert-danger alert-dismissible fade show mt-3  w-50" role="alert">
                                    <strong>{{session('delete')}}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                        @endif
                            @if(session('update'))
                                <div style="margin: 0 500px;" class="alert alert-success alert-dismissible fade show mt-3 ml-5 w-50" role="alert">
                                    <strong>{{session('update')}}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                        @endif
                        <!--End create Session  -->
                            <div class="card-body">
                                <div class="table-responsive border userlist-table">
                                    <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                        <thead>
                                        <tr>
                                            <th class="wd-lg-8p"><span> ردیف</span></th>
                                            <th class="wd-lg-8p"><span>عنوان </span></th>
                                            <th class="wd-lg-20p"><span> تعداد دانلود</span></th>
                                            <th class="wd-lg-20p"><span>تاریخ انتشار </span></th>
                                            <th class="wd-lg-20p text-center">عمل</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($magazines as $key=>$magazine)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$magazine->title}}</td>
                                                <td>0</td>
                                                <td>{{Carbon\Carbon::create($magazine->publishDate)->format('Y/m/d')}}</td>
                                                <td class="d-flex ">
                                                    <a href="{{asset("upload/magazine/file/".$magazine->file)}}" class="btn btn-sm btn-success ml-2">
                                                        <i class="fe fa fe-download"></i>
                                                    </a>
                                                    <a href="{{route('magazine.edit',$magazine->id)}}" class="btn btn-sm btn-info ml-2">
                                                        <i class="fe fe-edit-2"></i>
                                                    </a>
                                                    <form action="{{route('magazine.destroy',$magazine->id)}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm ml-2"><i class="fe fe-trash"></i></button>
                                                    </form>
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
@section('js')
    <script>
        $(document).ready(function () {
            $('.alert').fadeOut(250);

        });
    </script>
@endsection
