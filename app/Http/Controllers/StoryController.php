<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Customer;
use App\Models\Story;
use DB;
use Image;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tag;
use PHPUnit\Framework\MockObject\SoapExtensionNotAvailableException;
use Ramsey\Collection\Collection;
use Session;
use Psy\Util\Str;
use function Symfony\Component\Translation\t;

class StoryController extends Controller
{
   public function showManageStoryToManager()
   {
       $customerId = Session::get('userId');
       $stories = DB::table('stories')
           ->where('customer_id','=',$customerId)
           ->join('customers','stories.customer_id','=','customers.id')
           ->select('stories.id','stories.story_tags','stories.story_section','stories.story_title','stories.story_image','customers.first_name','customers.last_name','customers.customer_image','customers.id as customerId')
           ->get();
//       $tags = DB::table('taggable_taggables')
//           ->join('taggable_tags','taggable_taggables.tag_id','=','taggable_tags.tag_id')
//           ->select('taggable_taggables.tag_id','taggable_taggables.taggable_id as story_tag_id','taggable_tags.tag_id as tagId','taggable_tags.name')
//           ->get();
//       $storiesForTags = Story::where('customer_id','=',$customerId)->get();
//       $tags = array();
//       foreach($storiesForTags as $story)
//       {
//           $tags[] = [ $story->id , $story->tagList];
//       }

       $numberOfStory = count($stories);
       Session::put('numberOfStory',$numberOfStory);
       return view('front-end.story.manage-story',[
           'stories'=>$stories,
//           'tags'=>$tags
           ]);
   }
   public function showManageStoryToAdmin()
   {

//       $stories = DB::table('stories')
//           ->join('customers','stories.customer_id','=','customers.id')
//           ->select('stories.id','stories.story_tags','stories.story_section','stories.story_title','stories.story_image','customers.first_name','customers.last_name','customers.customer_image','customers.id as customerId')
//           ->get();
       $stories = Story::all();
       if(Session::has('adminId') && Session::has('adminName') && Session::has('userType')=='adminUser')
       {
           return view('admin-user.story.manage-story',[
               'stories'=>$stories
           ]);
       }

       return view('admin.story.manage-story',[
           'stories'=>$stories
       ]);

   }
   public function showPostStory()
   {
       return view('front-end.story.upload-story');
   }

    protected function uploadStoryImage($request){
        $storyImage = $request->file('story_image');
        $imageType = $storyImage->getClientOriginalExtension();
        $imageName = $request->story_image_caption.'-'.rand(100,999999).'.'.$imageType;
        $directory = 'front-end/story-images/';
        $imageUrl = $directory.$imageName;
        Image::make($storyImage)->resize(805,350)->save($imageUrl);
        return $imageUrl;

    }

   public function uploadStory(Request $request)
   {
       $this->validate($request,[
           'story_title'=> 'required|max:70|min:10',
           'story_description'=> 'required',
           'story_tags'=> 'required|max:30|min:3',
           'story_section'=> 'required',
           'story_image_caption'=> 'required',
       ]);

       $tagString = explode(',', $request->story_tags);
       $storyImageUrl = $this->uploadStoryImage($request);
       $story = new Story();
       $story->story_title = $request->story_title;
       $story->customer_id = $request->customer_id;
       $story->story_description = $request->story_description;
       $story->story_section = $request->story_section;
       $story->story_tags = $request->story_tags;
       $story->story_image_caption = $request->story_image_caption;
       $story->story_image = $storyImageUrl;
       $story->save();
       $story->tag($tagString);

       return redirect('/story/post')->with('message', 'Story uploded successfully!');
   }

   public function showStory($id)
   {
       $requireStory = Story::find($id);
       $customer = Customer::where('id','=',$requireStory->customer_id)->first();
       $comments = DB::table('comments')
                    ->where('story_id','=',$id)
                    ->join('customers','comments.customer_id','=','customers.id')
                    ->select('comments.*','customers.first_name','customers.customer_image','customers.last_name')
                    ->get();
       $numberOfComments = count($comments);
       $stories = DB::table('stories')
           ->orderby('stories.id','DESC')
           ->where('story_status','=',1)
           ->where('stories.id','!=',$requireStory->id)
           ->join('customers','stories.customer_id','=','customers.id')
           ->select('stories.*','customers.first_name','customers.last_name','customers.customer_image','customers.id as customerId')
           ->take(12)
           ->get();
       return view('front-end.story.view-story',[
           'requireStory'=>$requireStory,
           'stories'=>$stories,
           'customer'=>$customer,
           'comments'=>$comments,
           'numberOfComments'=>$numberOfComments
       ]);
   }
    public function showOwnStory($id)
    {
        $requireStory = Story::findOrFail($id);
        $comments = DB::table('comments')
            ->where('story_id','=',$id)
            ->join('customers','comments.customer_id','=','customers.id')
            ->select('comments.*','customers.first_name','customers.customer_image','customers.last_name')
            ->get();
        $numberOfComments = count($comments);
        return view('front-end.story.own-story-view',[
            'requireStory'=>$requireStory,
            'comments'=>$comments,
            'numberOfComments'=>$numberOfComments
        ]);
    }
   public function shareStory(Request $request)
   {

       $story = Story::findOrFail($request->story_id);
       $customerId = Session::get('userId');
       $newStory = new Story();
       $newStory->story_title = $story->story_title;
       $newStory->customer_id = $customerId;
       $newStory->story_description = $story->story_description;
       $newStory->story_section = $story->story_section;
       $story->story_tags = $request->story_tags;
       $newStory->story_status = $story->story_status;
       $newStory->story_image_caption = $story->story_image_caption;
       $newStory->story_image = $story->story_image;
       $newStory->save();
       $tagString = explode(',', $story->tagList);
       $newStory->tag($tagString);
       return redirect('story/view/'.$request->story_id);

   }
   public function deleteStory(Request $request)
   {
       $storyId = $request->story_id;
       $story = Story::findOrFail($storyId);
       $story->delete();
       return redirect('story')->with('Story removed successfully');
   }
   public function showStoryDetails($id)
   {
       $story = Story::findOrFail($id);
       return view('front-end.story.story-details',[
           'story'=>$story
       ]);
   }
    public function showStoryEdit($id)
    {
        $story = Story::findOrFail($id);
        return view('front-end.story.edit-story',[
            'story'=>$story
        ]);
    }
    public function updateStory(Request $request)
    {
        $this->validate($request,[
            'story_title'=> 'required|max:70|min:10',
            'story_description'=> 'required',
            'story_tags'=> 'required|max:30|min:3',
            'story_section'=> 'required',
            'story_image_caption'=> 'required',
        ]);
        $story = Story::findOrFail($request->story_id);
        $tagString = explode(',', $request->story_tags);
        $story->story_title = $request->story_title;
        $story->story_description = $request->story_description;
        $story->story_tags = $request->story_tags;
        $story->story_section = $request->story_section;
        $story->story_image_caption = $request->story_image_caption;
        $image = $request->file('story_image');
        if($image)
        {
            unlink($story->story_image);
            $imageUrl = $this->uploadStoryImage($request);
            $story->story_image = $imageUrl;
        }
        $story->save();
        $story->tag($tagString);

        return redirect('story')->with('message', 'Story updated successfully!');
    }

    public function makeStoryUnlist($id)
    {
        $story = Story::findOrFail($id);
        $story->story_status = 0 ;
        $story->save();
        if(Session::has('adminId') && Session::has('adminName') && Session::has('userType')=='adminUser')
        {
            return redirect('admin/manage/story')->with('message','Story Unlisted Successfully');
        }
        return redirect('manage/story')->with('message','Story Unlisted Successfully');
    }

    public function showStoryDetailsToAdmin($id)
    {
        $story = Story::findOrFail($id);
        if(Session::has('adminId') && Session::has('adminName') && Session::has('userType')=='adminUser')
        {
            return view('admin-user.story.story-details',[
                'story'=>$story
            ]);
        }
        return view('admin.story.story-details',[
            'story'=>$story
        ]);
    }

    public function showStoriesToAdmin()
    {
        $stories = DB::table('stories')
            ->where('story_status','=',1)
            ->join('customers','stories.customer_id','=','customers.id')
            ->select('stories.*','customers.first_name','customers.last_name','customers.customer_image','customers.id as customerId')
            ->orderby('id','DESC')->get();
        if(Session::has('adminId') && Session::has('adminName') && Session::has('userType')=='adminUser')
        {
            return view('admin-user.story.view-stories',[
                'stories'=>$stories
            ]);
        }
        return view('admin.story.view-stories',[
            'stories'=>$stories
        ]);
    }




}
