@extends('backEnd.layouts.master')
@section('head-tag')
    <link rel="stylesheet" href="{{ asset('backEnd/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection
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
                                    <label class="main-content-label mb-0 pt-1">درج تحلیل</label>
                                    <div class="mr-auto float-right">
                                        <a href="{{route('analysis.index')}}" class="btn btn-info"> <i class="fa fa-arrow-right mx-2"></i>برگشت به لیست</a>
                                    </div>
                                </div>
                                <p class="tx-12 tx-gray-500 mt-0 mb-2">مدیریت / درج تحلیل </p>
                                <form action="{{route('analysis.store')}}" method="post" enctype="multipart/form-data" class="my-5">
                                    @csrf
                                    <div class="row d-flex">
                                        <div class="col-xl-12">
                                            <div class="form-group">
                                                <input type="text" name="title" class="form-control " placeholder="عنوان تحلیل" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex row ">
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="titleTwo" class="form-control down-title-blog-create"
                                                       placeholder="زیر عنوان تحلیل" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="imageAlt" class="form-control tag-img-main" placeholder=" تگ آلت عکس اصلی" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="metaKeyWords" class="form-control meta-keyboard" placeholder="متا کیوورد" />
                                            </div>
                                            @cannot('تحلیلگر')
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1"  class=" my-2">نام نویسنده</label>
                                                <select class="form-control  select-role-search-form " name="user_id" placeholder="ds"
                                                        style="font-size: large;" id="exampleFormControlSelect1">
                                                    @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @endcannot
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="form-group">
{{--                                                <input class="form-control"  name="publishDate" placeholder="تاریخ انتشار" type="text" data-jdp />--}}
                                                <input type="text" name="publishDate" id="publishDate" class="form-control form-control-sm d-none">
                                                <input type="text" id="publishDate_view" class="form-control form-control-sm">
                                            </div>
                                            <div class="form-group">
                                                <label for="addres-article" class="addres-article my-2">آدرس تحلیل </label>
                                                <input type="text" id="addres-article" name="url" class="form-control addres-article-input text-left"
                                                       value="{{mt_rand(1000,10000)}}" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control meta-discription" name="metaDescription" placeholder="متا دیسکریپشن" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col pb-3">
                                        <button class="tags-btn col-12 text-right " type="button" data-toggle="collapse"
                                                data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                            تگ ها
                                        </button>

                                        <div class="collapse" id="collapseExample">
                                            <div class="card card-body tags-div col-12 ">
                                                @foreach($tags as $tag)
                                                <button type="button"  id="LableTagCheckBox_{{$tag->id}}" value="{{$tag->id}}" onclick="SelectTag({{$tag->id}})"     class="tag-spans  py-1 px-4 mx-1 my-1 btn cyan" >{{$tag->title}}</button>

                                                    <input type="hidden" id="TagCheckBox_{{$tag->id}}"   name="tag[]"  value="" class="cyan"    />
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col pb-3">
                                        <button class="tags-btn col-12 text-right " type="button" data-toggle="collapse"
                                                data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                                            گروه تحلیل
                                        </button>

                                        <div class="collapse" id="collapseExample2">
                                            <div class="card card-body tags-div col-12 ">
                                                @foreach($articleGroup as $row)
                                                    <button type="button"  id="LableArticleCheckBox_{{$row->id}}" value="{{$row->id}}" onclick="SelectAnalysis({{$row->id}})"     class="tag-spans  py-1 px-4 mx-1 my-1 btn cyan" >{{$row->title}}</button>
                                                @endforeach
                                                    <input type="hidden" id="ArticleCheckBox"   name="article_Group_id"  value="" class="cyan"    />



                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-12 ">
                                            <!-- drag and drop -->
                                            <div class="row justify-content-center  mb-5">
                                                <div class="col-10 mt-5">
                                                    <p>عکس اصلی</p>
                                                </div>
                                                <div class="drop-zone col-10">
                                                    <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                                    <input type="file" name="image" id="drag1" class="drop-zone__input">
                                                </div>
                                            </div>
                                            <!-- drag and drop -->
                                            <div>
                                                <label for="editor1">متن اصلی</label>
                                                <textarea name="mainContent" id="editor1" rows="10" cols="80">

                                       </textarea>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-5 ckeditor-2 ">
                                            <div>
                                                <label for="editor2">خلاصه تحلیل</label>
                                                <textarea name="summary" id="editor2" rows="10" cols="80">

                                       </textarea>
                                            </div>
                                        </div>
                                        <div class="col text-left my-5">
                                            <button type="submit" class="btn btn-info">
                                                ذخیره
                                            </button>
                                        </div>
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
@section('js')
            <script>

                    let checkbox = document.querySelector('.mycheckbox[type="checkbox"]');
                    let downTitleBlogTitle = document.querySelector(".down-title-blog-create")
                    let tagImgMain = document.querySelector(".tag-img-main")
                    let addresArticle = document.querySelector(".addres-article")
                    let addresArticleInput = document.querySelector("#addres-article")
                    let metaDiscription = document.querySelector(".meta-discription")
                    let metaKeyboard = document.querySelector(".meta-keyboard")
                    let tagsBtn = document.querySelector(".tags-btn")
                    let customFileInput = document.querySelector(".custom-file")
                    let ckeditor2 = document.querySelector(".ckeditor-2")

                    checkbox.addEventListener('change', function () {
                    if (checkbox.checked) {
                    downTitleBlogTitle.style.display = "none"
                    tagImgMain.style.display = "none"
                    addresArticle.style.display = "none"
                    addresArticleInput.style.display = "none"
                    metaDiscription.style.display = "none"
                    metaKeyboard.style.display = "none"
                    tagsBtn.style.display = "none"
                    customFileInput.style.display = "none"
                    ckeditor2.style.display = "none"
                } else {
                    downTitleBlogTitle.style.display = "block"
                    tagImgMain.style.display = "block"
                    addresArticle.style.display = "block"
                    addresArticleInput.style.display = "block"
                    metaDiscription.style.display = "block"
                    metaKeyboard.style.display = "block"
                    tagsBtn.style.display = "block"
                    customFileInput.style.display = "block"
                    ckeditor2.style.display = "block"
                    return;
                }
                });
                    $(document).ready(function() {
                        $('.js-example-basic-multiple').select2();
                        $('.js-example-basic-single').select2();
                    });

            </script>
            <script>
                CKEDITOR.replace('editor1',{
                    filebrowserUploadUrl : "{{ route('ckeditor.upload', ["_token" => csrf_token()]) }}",
                    filebrowserUploadMethod : 'form',
                });
                CKEDITOR.replace('editor2', {
                    filebrowserUploadUrl : "{{ route('ckeditor.upload', ["_token" => csrf_token()]) }}",
                    filebrowserUploadMethod : 'form',
                });
                // jalaliDatepicker.startWatch();
            </script>
            <script>
                function SelectTag(id){
                        if ($('#TagCheckBox_' + id).hasClass('cyan')){
                           let amir = $('#LableTagCheckBox_' + id).val();
                            $('#TagCheckBox_' + id).val(amir);
                            $('#TagCheckBox_' + id).removeClass('cyan');
                        }else {
                            $('#TagCheckBox_' + id).addClass('cyan');
                            $('#TagCheckBox_' + id).removeAttr('value');
                        }
               }
            </script>
            <script>
                function SelectAnalysis(id){
                    if ($('#ArticleCheckBox').hasClass('cyan')) {
                        let data = $('#LableArticleCheckBox_' + id).val();
                        $('#ArticleCheckBox').val(data);
                        $('#ArticleCheckBox').removeClass('cyan');

                    }else {
                        $('#ArticleCheckBox').addClass('cyan');
                        $('#ArticleCheckBox').removeAttr('value');


                    }
                }
            </script>
            <script src="{{ asset('backEnd/jalalidatepicker/persian-date.min.js') }}"></script>
            <script src="{{ asset('backEnd/jalalidatepicker/persian-datepicker.min.js') }}"></script>
            <script>
                $(document).ready(function() {
                    $('#publishDate_view').persianDatepicker({
                        format: 'YYYY/MM/DD',
                        altField: '#publishDate',
                        timePicker: {
                            enabled: true,
                            meridiem: {
                                enabled: true
                            }
                        }
                    })
                });
            </script>


@endsection
