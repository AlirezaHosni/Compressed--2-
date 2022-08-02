@extends('backEnd.layouts.master')
@section('master')
    <!-- Main Content-->
    <div class="main-content side-content pt-0">
        <div class="container-fluid">
            <div class="inner-body">
                <!--Row-->
                @foreach($submenu as $item)
                <div class="row"></div>
                <div class="row row-sm mt-5">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                        <div class="card custom-card">
                            <div class="card-header border-bottom-0 pb-0">
                                <div class="d-flex justify-content-between">
                                    <label class="main-content-label mb-0 pt-1">مدیریت منو</label>
                                    <div class="mr-auto float-right">
                                        <a href="{{route('submenus.create')}}" class="btn btn-info"> <i class="fa fa-plus mx-2"></i>  درج نوع منو</a>
                                    </div>
                                    @if(!empty($submenu))

                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / مدیریت منو</p>
                                <h4>{{$item->title}}</h4>
                                <div class="d-flex justify-content-between mt-3">
                                    <p>{{$item->systemTitle}}</p>
                                    <form action="{{route('createMenu',$item->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-info">درج منو</button>
                                    </form>
                                </div>
                                @endif

                            </div>
                            <div class="card-body">
                                <div class="table-responsive border userlist-table">
                                    <table class="table card-table table-striped table-vcenter text-nowrap mb-0">
                                        <thead>
                                        <tr>
                                            <th class="wd-lg-8p"><span> ردیف</span></th>
                                            <th class="wd-lg-8p"><span> عنوان</span></th>
                                            <th class="wd-lg-20p"><span> آدرس</span></th>
                                            <th class="wd-lg-20p"><span> والد </span></th>
                                            <th class="wd-lg-8p"><span> اولویت</span></th>
                                            <th class="wd-lg-20p text-center">عمل</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                          @foreach($menus as $key=>$menu)
                                              @if($menu->subMenu_id == $item->id)
                                              <tr>
                                                  <td>{{++$key}}</td>
                                                  <td>{{$menu->title}}</td>
                                                  <td>{{$menu->url}}</td>
                                                  <td>{{$menu->parent_id}}</td>
                                                  <td>{{$menu->priority}}</td>
                                                  <td class="d-flex justify-content-center">
                                                      <a href="{{route('menus.edit',$menu->id)}}" class="btn btn-sm btn-primary ml-2">
                                                          <i class="fe fe-edit-2"></i>
                                                      </a>
                                                      <form action="{{route('menus.destroy',$menu->id)}}" method="post" enctype="multipart/form-data">
                                                          @csrf
                                                          @method('delete')
                                                          <button type="submit" class="btn btn-danger"><i class="fe fe-trash"></i></button>
                                                      </form>
                                                  </td>
                                              </tr>
                                              @endif
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

                <!-- row closed  -->
            </div>
                @endforeach
        </div>
    </div>
    <!-- End Main Content-->
@endsection
