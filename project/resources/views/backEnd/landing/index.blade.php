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
                                    <label class="main-content-label mb-0 pt-1">لندینگ ها</label>
                                    <div class="mr-auto float-right">
                                        <a href="{{route('trashLanding')}}" class="btn btn-danger">مقالات حذف شده<i
                                                class="fa fa-trash mx-2"></i></a>
                                        <a href="{{route('landing.create')}}" class="btn btn-success">درج لندینگ +</a>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / لندینگ ها</p>
                                <form class="my-5">
                                    <div class="d-flex">
                                        <div class="form-group col-xl-10 col-md-10 col-sm-12">
                                            <input id="search_box" type="text" class="form-control"
                                                   placeholder="جستجو در عناوین و متن - تاریخ درج-تاریخ انتشار " />
                                        </div>
                                    </div>


                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive border userlist-table">
                                    <table id="myTable" class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                        <thead>
                                        <tr>
                                            <th class="wd-lg-8p"><span> ردیف</span></th>
                                            <th class="wd-lg-8p"><span>عنوان مقاله</span></th>
                                            <th class="wd-lg-20p"><span>تاریخ درج</span></th>
                                            <th class="wd-lg-20p"><span>تاریخ انتشار</span></th>
                                            <th class="wd-lg-20p"><span>وضعیت فعال بودن</span></th>
                                            <th class="wd-lg-20p"><span>تعداد بازدید</span></th>
                                            <th class="wd-lg-20p text-center">عمل</th>
                                        </tr>
                                        </thead>
                                            <tbody>
                                            @foreach($landing as $key=>$item)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$item->title}}</td>
                                                    <td>{{ \Hekmatinasser\Verta\Facades\Verta::instance($item->created_at)->format('Y/m/d') }}</td>
                                                    <td>{{ \Hekmatinasser\Verta\Facades\Verta::instance($item->publishDate)->format('Y/m/d') }}</td>
                                                    @if($item->active == 0)
                                                        <td><i class="fa fa-close text-danger fs-1"></i>
                                                            <span class="label text-muted d-flex"></span>
                                                        </td>
                                                    @else
                                                        <td><i class="fa fa-check"></i>
                                                            <span class="label text-muted d-flex"></span>
                                                        </td>
                                                    @endif
                                                    <td>0</td>
                                                    <td class="d-flex justify-content-center">
                                                        <a href="{{route('landing.changeActiveStatus', $item->id)}}" class="btn btn-sm btn-primary ml-2" title="تغییر وضعیت انتشار">
                                                            @if($item->active == 1)
                                                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                                            @else
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                            @endif
                                                        </a>
                                                        <a href="{{route('landing.telegram',$item->id)}}" class="btn btn-sm btn-primary ">
                                                            <i class="fe fe-send"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-success mr-2" href="{{route('landing.show',$item->id)}}">
                                                            <i class="fe fa fe-eye"></i>
                                                        </a>
                                                        <a href="{{route('landing.edit',$item->id)}}" class="btn btn-sm btn-info mr-2">
                                                            <i class="fe fe-edit-2"></i>
                                                        </a>
                                                        <form action="{{route('landing.destroy',$item->id)}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm mr-2"><i class="fe fe-trash"></i></button>
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
        oTable = $('#myTable').DataTable({
            "bPaginate": false,
            "bInfo": false,
        });
        $('#search_box').keyup(function(){
            oTable.search($(this).val()).draw() ;
        })

    </script>
@endsection
