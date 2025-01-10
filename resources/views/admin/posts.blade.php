<x-dashborad-layout title="dashborad">
    <style>
        .form-control{
            font-size: 18px;
        }
        
        
        </style>
    <x-slot:head>
        <h1><i class="fa fa-th-list"></i> مقالات </h1>
    </x-slot:head>
<link rel="stylesheet" href="{{asset('dashbord_style/css/summernote/summernote-lite.min.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
.custom-thead{
    background-color: #233490;
    color:white;
}
span.select2-dropdown.select2-dropdown--below {
    position: relative;
}
.note-editable {
    background-color: white;
}
span.select2.select2-container.select2-container--default.select2-container--focus.select2-container--below.select2-container--open {
    width: 339px;
}

</style>
<!-- row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card mg-b-20">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    @can('مقالات-انشاء')
                    <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة مقال</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table  table-bordered table-hover  key-buttons text-md-nowrap" data-page-length='50' style="text-align: center">
                        <thead class="custom-thead">
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">صورة</th>
                                <th class="border-bottom-0">عنوان</th>
                                <th class="border-bottom-0">الكاتب</th>
                                <th class="border-bottom-0">الحالة</th>
                                <th class="border-bottom-0">هل تم انتهاء منه</th>
                                <th class="border-bottom-0">قسم</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td><img src="{{asset('assets/posts/'.$post->image)}}" width="100" height="100"></td>
                                <td>{{ $post->title }}</td>

                                <td>{{ $post->admin->name }}</td>
                                <td>{{ $post->status ? 'مفعل':'غير مفعل'}}</td>
                                <td>{{ $post->is_finsih_read ? 'مفعل':'غير مفعل'}}</td>
                                <td>{{ $post->category->name}}</td>
                                @if($post->user_id==auth()->id() || auth()->user()->role[0]=='admin')
                                <td>

                                    @can('مقالات-تعديل')
                                    <a class="modal-effect btn btn-sm btn-info" data-id="{{ $post->id }}" data-toggle="modal" id="showEditModelPost" href="javascript:void(0)" title="تعديل"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('مقالات-حذف')
                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-id="{{ $post->id }}" data-title="{{ $post->title }}" data-toggle="modal" href="#deletePostModel" title="حذف"><i class="fa fa-trash"></i></a>
                                    @endcan
                                </td>
                                @else
                                <td>...</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- اضافة مقاله -->
    <div class="modal" id="modaldemo8" style="overflow:scroll">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">اضافة مقالات</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان</label>
                            <input type="text" class="form-control" id="title_add" name="title" value="{{old('title')}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> وصف مقال
                            </label>
                            <textarea class="form-control " id="discription_add" name="description" value="{{old('description')}}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">محتوي مقال
                            </label>
                            <textarea name="content" class="form-control summernote" id="content_add">{{old('content')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">القسم</label>
                            <select name="category_id" class="form-control" id="category_add">
                                @foreach ($categories as $cat)
                                <option value="{{$cat->id}}" {{old('category_id')==$cat->id?"selected":""}}>{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group d-flex flex-column" >
                            <label for="exampleInputEmail1">وسوم</label>
                            <select name="tags[]" multiple id="tags tag_add" class="form-control js-example-basic-multiple d-block" >
                                @foreach ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">حاله</label>
                            <select name="status" class="form-control" id="status_add">
                                <option value="0" {{old('status')==0?"selected":""}}  >غير مفعل</option>
                                <option value="1" {{old('status')==1?"selected":""}} >مفعل</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">هل انتهي وجهاز للاطلاق</label>
                            <select name="is_finsih_read" class="form-control" id="is_finsih_read_add">
                                <option value="0" {{old('is_finsih_read')==0?"selected":""}} >غير مفعل</option>
                                <option value="1" {{old('is_finsih_read')==1?"selected":""}} selected>مفعل</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">تعليقات المستخدمين</label>
                            <select name="comment_able" class="form-control" id="comment_able_add">
                                <option value="0" {{old('status')==0?"selected":""}}>غير مفعل</option>
                                <option value="1" {{old('status')==1?"selected":""}}>مفعل</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">صورة مقال</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Basic modal -->
    </div>

    <!-- edit -->
    <div class="modal" id="postEditModel" style="overflow:scroll">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">تعديل مقاله</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.posts.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="exampleInputEmail1">عنوان</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">محتوي مقاله</label>
                            <textarea name="description" class="form-control " id="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> وصف المقالة</label>
                            <textarea class="form-control  summernote" id="content" name="content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">القسم</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group  d-flex flex-column">
                            <label for="exampleInputEmail1">تصنيف</label>
                            <select name="tags[]" id="tags" multiple class="form-control js-example-basic-multiple d-block">
                                @foreach ($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">حاله</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0">غير مفعل</option>
                                <option value="1">مفعل</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">هل انتهي وجهاز للاطلاق</label>
                            <select name="is_finsih_read" id="is_finsih_read" class="form-control">
                                <option value="0">ليس بعد </option>
                                <option value="1">تم</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">تعليقات المستخدمين</label>
                            <select name="comment_able" id="comment_able" class="form-control">
                                <option value="0">غير مفعل</option>
                                <option value="1">مفعل</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">صورة مقال</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- delete -->
    <x-delete-model route="admin.posts.delete" />
</div>
@push('scripts')
<script src="{{ asset('dashbord_style/css/summernote/summernote-lite.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    <?php if (!$errors->any()) { ?>
        $("#title_add").val("");
        $("#discription_add").val("");
        $("#content_add").val("");
        $("#tag_add").val("");
        $("#category_add").val("");
        $("#status_add").val("");
        $("#is_finsih_read_add").val("");
        $("#comment_able_add").val("");
    <?php } ?>



    $(()=>{
        $('.summernote').summernote({
            height: 300,
            placeholder: 'Start typing your text...',
            lang: 'es-ES',
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['ltr', 'rtl']],
                ['insert', ['link', 'picture', 'video', 'hr']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });


    // $(document).ready(function() {
    //     $('#title_add').on('input', function() {
    //         let name = $(this).val();

    //         // إذا كان الحقل فارغاً، لا تفعل شيئاً
    //         if (name.trim() === '') {
    //             $('#message').text('');
    //             return;
    //         }

    //         // إرسال طلب POST باستخدام AJAX
    //         $.ajax({
    //             url: '/check-name',
    //             method: 'POST',
    //             data: {
    //                 title: title,
    //                 _token: $('meta[name="csrf-token"]').attr('content') // إرسال CSRF Token
    //             },
    //             success: function(response) {
    //                 if (response.exists) {
    //                     $('#message').text('Name already exists in the database.');
    //                 } else {
    //                     $('#message').text('Name does not exist in the database.');
    //                 }
    //             },
    //             error: function() {
    //                 $('#message').text('An error occurred. Please try again.');
    //             }
    //         });
    //     });
    // });










    $('body').on('click', '#showEditModelPost', function() {
        var post_id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: '/public/admin/posts/edit/' + post_id,
            dataType: "json",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: (data) => {
                console.log(data.tags);
            $('#postEditModel').modal('show');
            $('#id').val(data.id);
            $('#title').val(data.title);
            $('#description').val(data.description);
            $('#content').summernote('code', data.content);
            $('#status').val(data.status);
            $('#comment_able').val(data.comment_able);
            $('#image').val(data.image);
            $(`#category_id option[value='${data.category_id}']`).prop('selected', true);
            $(`#status option[value='${data.status}']`).prop('selected', true);
            $(`#is_finsih_read option[value='${data.is_finsih_read}']`).prop('selected', true);
            var selectedValues = data.tags;
            var options = selectedValues.map(function(value) {
    console.log(value);
    return new Option( value['name'],value['id'], true, true);
        });
$('.js-example-basic-multiple').append(options).trigger('change');
            }
        })
    })
    $(()=>{
    $('.js-example-basic-multiple').select2();})
</script>
@endpush
</x-dashborad-layout>