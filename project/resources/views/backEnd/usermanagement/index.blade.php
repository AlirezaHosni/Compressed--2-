@extends('backEnd.layouts.master')
@section('master')
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
    <div class="row row-sm mt-5">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
            <div class="card custom-card">
                <div class="card-header border-bottom-0 pb-0">
                    <div class="d-flex justify-content-between">
                        <label class="main-content-label mb-0 pt-1">مدیریت کاربران</label>

                    </div>
                    <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / مدیریت کاربران</p>
                </div>
                <!-- create Session  -->
                @if(session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong>{{session('delete')}}</strong>
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
                                <th class="wd-lg-8p"><span>نام کاربری </span></th>
                                <th class="wd-lg-20p"><span> شماره همراه</span></th>
                                <th class="wd-lg-20p"><span> ایمیل</span></th>
                                <th class="wd-lg-20p text-center"><span> نقش</span></th>
                                <th class="wd-lg-20p text-center"><span> وضعیت</span></th>
                                <th class="wd-lg-20p text-center">عمل</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @foreach($users as $key=>$user)
                                     <tr>
                                         <td>{{++$key}}</td>
                                         <td>{{$user->name}}</td>
                                         <td>{{$user->phoneNumber}}</td>
                                         <td>{{$user->email}}</td>
                                         <td class="text-center">{{implode(',',$user->roles()->get()->pluck('name')->toArray())}}</td>
                                         <td class="text-center">
                                             @if($user->active === 1)
                                             <i class="fa fa-check text-success fs-1"></i>
                                             <span class="label text-muted d-flex"></span>
                                             @elseif($user->active === 0)
                                             <i class="fa fa-close text-danger fs-1"></i>
                                             <span class="label text-muted d-flex"></span>
                                             @endif
                                         </td>
                                         <td class="d-flex">
                                             <a href="{{route('userManagement.show',$user->id)}}" class="btn btn-sm btn-success">
                                                 <i class="fe fa fe-eye"></i>
                                             </a>
                                             <a href="{{route('userManagement.edit',$user->id)}}" class="btn btn-sm btn-info">
                                                 <i class="fe fe-edit-2"></i>
                                             </a>
                                             <form action="{{route('userManagement.destroy',$user->id)}}" method="post">
                                                 @csrf
                                                 @method('delete')
                                                 <button  class="btn btn-sm btn-danger"><i class="fe fe-trash"></i></button>
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
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.alert').fadeOut(250);

        });
    </script>
@endsection
