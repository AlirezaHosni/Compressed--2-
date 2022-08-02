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
                                    <label class="main-content-label mb-0 pt-1">گروه مقاله</label>
                                    <div class="mr-auto float-right">
                                        <a href="{{route('articleGroup.create')}}" class="btn btn-success">درج گروه مقالات +</a>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / گروه مقاله</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive border userlist-table">
                                    <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                        <thead>
                                        <tr>
                                            <th class="wd-lg-8p"><span> ردیف</span></th>

                                            <th class="wd-lg-8p"><span> عنوان</span></th>

                                            <th class="wd-lg-20p"><span> آدرس</span></th>
                                            <th class="wd-lg-20p"><span>عنوان والد </span></th>
                                            <th class="wd-lg-20p text-center"><span>ویژه اخبار کوتاه </span></th>

                                            <th class="wd-lg-20p text-center">عمل</th>
                                        </tr>
                                        </thead>
                                         <tbody>
                                         @foreach($articleGroup as $key=>$item)
                                             <tr>
                                                 <td>{{++$key}}</td>
                                                 <td>{{$item->title}}</td>
                                                 <td>{{$item->url}}</td>
                                                 <td>{{implode(',',$item->menu()->get()->pluck('title')->toArray())}}</td>
                                                 <td class="text-center">
                                                     @if($item->shortNews === 1)
                                                         <i class="fa fa-check text-success fs-1"></i>
                                                         <span class="label text-muted d-flex"></span>
                                                     @elseif($item->shortNews === 0)
                                                         <i class="fa fa-close text-danger fs-1"></i>
                                                         <span class="label text-muted d-flex"></span>
                                                     @endif
                                                 </td>
                                                 <td class="d-flex justify-content-center ml-3">
                                                     <a href="{{route('articleGroup.edit',$item->id)}}" class="btn btn-sm btn-primary ml-3">
                                                         <i class="fe fe-edit-2"></i>
                                                     </a>
                                                     <form action="{{route('articleGroup.destroy',$item->id)}}" method="post">
                                                         @csrf
                                                         @method('delete')
                                                         <button  class="btn btn-sm btn-danger ml-3"><i class="fe fe-trash"></i></button>
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
