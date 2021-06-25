<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use DB;
use Session;

class CommentController extends Controller
{
    public function submitComment(SubmitCommentRequest $request)
    {
        $customerId = Session::get('userId');
        $comment = new Comment();
        $comment->customer_id = $customerId;
        $comment->story_id = $request->story_id;
        $comment->story_comment = $request->story_comment;
        $comment->save();
        $storyId = $request->story_id;
        return redirect('story/view/'.$storyId);
    }

    public function deleteComment(Request $request)
    {
        $commentId = $request->comment_id;
        $storyId = $request->story_id;
        $commnet = Comment::findOrFail($commentId);
        $commnet->delete();
        return redirect('story/view/'.$storyId);
    }
    public function showStoryCommentToAdmin($id)
    {
        $comments = DB::table('comments')
            ->where('story_id','=',$id)
            ->join('customers','comments.customer_id','=','customers.id')
            ->select('comments.*','customers.first_name','customers.last_name')
            ->get();
        if(Session::has('adminId') && Session::has('adminName') && Session::has('userType')=='adminUser')
        {
            return view('admin-user.story.manage-story-comment',[
                'comments'=>$comments
            ]);
        }
        return view('admin.story.manage-story-comment',[
            'comments'=>$comments
        ]);

    }
    public function deleteStoryCommentByAdmin($id)
    {

        $comment = Comment::findOrFail($id);
        $storyId = $comment->story_id;
        $comment->delete();

        if(Session::has('adminId') && Session::has('adminName') && Session::has('userType')=='adminUser')
        {
            return redirect('/admin/manage/story/comment/'.$storyId)->with('message','Comment remove successfully!');

        }

        return redirect('/manage/story/comment/'.$storyId)->with('message','Comment remove successfully!');
    }
}
