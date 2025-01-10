<x-dashborad-layout title="dashborad">
    <x-slot:head>
        <h1><i class="fa fa-comment"></i> تعليقات علي المقالات</h1>
    </x-slot:head>
<style>
.custom-thead{
    background-color: #233490;
    color:white;
}
</style>
<!-- row -->
<div class="row">
    <div class="col-xl-12">
        <div class="card mg-b-20">
          
            <div class="card-body">
                <div class="table-responsive" id="ajax_responce_serarchDiv">
                    <table id="example1" class="table table-bordered table-hover key-buttons text-md-nowrap" data-page-length='50' style="text-align: center">
                        <thead class="custom-thead">
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">اسم</th>
                                <th class="border-bottom-0"> ايميل</th>
                                <th class="border-bottom-0"> صورة المقال</th>
                                <th class="border-bottom-0">تعليق </th>
                                <th class="border-bottom-0">الحالة</th>
                                <th class="border-bottom-0">مقال</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email}}</td>
                                <td><img src="{{asset('assets/posts/'.$comment->post->image)}}" width="150px" height="150px"></td>
                                <td>{{ $comment->comment}}</td>
                                 <td>{{ $comment->status=="1"?'مفعل':'غير مفعل' }}</td>
                                 <td>{{$comment->post->title}}</td>
                                <td>
                                    <a class="modal-effect btn btn-sm btn-info" data-id="{{ $comment->id }}" data-toggle="modal" id="showEditModelCategory" href="showEditModelCategory" title="تعديل"><i class="fa fa-edit"></i></a>
                                    <a class="modal-effect btn btn-sm btn-danger" id="deleteCoateory" data-effect="effect-scale" data-id="{{ $comment->id }}" data-name="{{ $comment->name }}" data-toggle="modal" href="deleteCoateory" title="حذف"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$comments->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- edit -->
    <div class="modal fade" id="categoryEditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">تعديل القسم</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.comments.update')}}" method="POST" >
                        @csrf
                        <input type="hidden" name="id" id="cat_id">
                        <div class="form-group">
                            <label for="exampleInputEmail1">الحالة</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0" {{old('status')=='0'?"selected":""}}>غير مفعل</option>
                                <option value="1" {{old('status')=='1'?"selected":""}}>مفعل</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">تاكيد</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete category -->
    <x-delete-model route="admin.comments.delete" />
    <!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@push('scripts')
<!-- Internal Data tables -->
<script>
    <?php if (!$errors->any()) { ?>
        $("#name_add").val("");
        $("#status_add").val("");
    <?php } ?>
    $('body').on('click', '#showEditModelCategory', function() {
        var cat_id = $(this).data('id');
        $.ajax({
            type: "POST",
            url: '/admin/comments/edit/' + cat_id,
            dataType: "json",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: (data) => {
                $('#categoryEditModel').modal('show');
                $('#cat_id').val(data.id);
                $(`#status option[value='${data.status}']`).prop('selected', true);
            }
        })
    });
   
</script>

@endpush
</x-dashborad-layout>