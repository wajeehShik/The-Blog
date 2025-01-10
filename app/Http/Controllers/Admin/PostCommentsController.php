<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    //
    public function index(){
        $comments=Comment::with('post')->paginate(30);
        return view('admin.post_comments',compact('comments'));
    }
      public function    edit($id){
        $cat = Comment::whereId($id)->first();
        if ($cat) {
            return Response::json($cat);
        }
        return false;
      }
    public function  update(Request $request){
        $comment = Comment::where('id', $request->id)->firstOrFail();
        $data['status']=$request->post('status');
        $comment->update($data);
        alert()->success('تعليق', 'تم تعديل حالة  التعليق بنجاح');
        return redirect()->route('admin.comments.index');
    }
    public function delete(Request $request){

        $comment = Comment::where('id', $request->id)->firstOrFail();
        $comment->delete();
        alert()->warning('تعليق', 'تم حذف تعليق بنجاح');
        return redirect()->route('admin.comments.index');
    }
}
