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
                                    <label class="main-content-label mb-0 pt-1">مقالات</label>

                                    <div class="mr-auto float-right">
                                        <a href="{{route('Trash.Article')}}" class="btn btn-danger">مقالات حذف شده<i class="fa fa-trash mx-2"></i></a>

                                        <a href="{{route('article.create')}}" class="btn btn-success">درج مقاله +</a>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / مقالات</p>

                                <form class="my-5">
                                    <div class="d-flex">
                                        <div class="form-group col-xl-10 col-md-10 col-sm-12">
                                            <input type="text" id="search_box" class="form-control" placeholder="جستجو در عناوین و متن - تاریخ درج-تاریخ انتشار " />
                                        </div>
                                    </div>
                                    <div class="d-flex search-submit-form">

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
                                            <th class="wd-lg-20p"><span>وضعیت انتشار</span></th>
                                            <th class="wd-lg-20p"><span>تعداد بازدید</span></th>
                                            <th class="wd-lg-20p text-center">عمل</th>
                                        </tr>
                                        </thead>
                                           <tbody>
                                           @foreach($article as $key=>$item)
                                               <tr>
                                                   <td>{{++$key}}</td>
                                                   <td>{{ \Illuminate\Support\Str::limit($item->title, 100)}}</td>
                                                   <td>{{\Hekmatinasser\Verta\Facades\Verta::instance($item->created_at)->format('Y/m/d')}}</td>
                                                   <td>{{Carbon\Carbon::create($item->publishDate)->format('Y/m/d')}}</td>
                                                   @if(\Carbon\Carbon::now()->isBefore($item->publishDate))
                                                       <td><i class="fa fa-close text-danger fs-1"></i>
                                                           <span class="label text-muted d-flex"></span>
                                                       </td>
                                                       @else
                                                       <td><i class="fa fa-check"></i>
                                                           <span class="label text-muted d-flex"></span>
                                                       </td>
                                                       @endif
                                                   <td>0</td>
                                                   <td class="d-flex">
                                                       <a href="{{route('article.telegram',$item->id)}}" class="btn btn-sm btn-primary ml-2">
                                                           <i class="fe fe-send"></i>
                                                       </a>
                                                       <a href="{{route('article.details',$item->url)}}" class="btn btn-sm btn-success ml-2">
                                                           <i class="fe fa fe-eye"></i></a>
                                                       <a href="{{route('article.edit',$item->id)}}" class="btn btn-sm btn-info ml-2">
                                                           <i class="fe fe-edit-2"></i>
                                                       </a>
                                                       <form action="{{route('article.destroy',$item->id)}}" method="post">
                                                           @csrf
                                                           @method('delete')
                                                           <button class="btn btn-danger"><i class="fe fe-trash"></i></button>
                                                       </form>
                                                   </td>

                                               </tr>
                                           @endforeach
                                           </tbody>
                                    </table>
                                </div>
                                <ul class="pagination mt-4 mb-0 float-left">
                                    {{ $article->links() }}
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
