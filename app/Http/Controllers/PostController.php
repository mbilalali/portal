<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function addView(){
        $categories = Category::all();
        return view('website.addPost', ['categories'=>$categories]);
    }
    public function write(Request $request){
        $post = new Post();

        $post->title = $request->title;
        $post->image = $request->image;
        $post->content = $request->postcontent;
        $post->date = date('Y-m-d H:i:s');
        $userid = Auth::user()->id;
        $post->user_id = $userid;
        $post->price = $request->price;
        $post->category = $request->category;
        $post->is_approved = "1";
        $post->status = "1";
        $imgData = array(
            'data'=>$request,
            'returnType'=>'request',
            'request_name'=>'image',
            'request_name_new'=>'blog',
            'folder_name'=>'blog',
            'file_name'=>'post',
        );
        $request = $this->manageAttachment($imgData);
        $post->image = $request->blog;
        $post->save();
        return redirect()->back()->with('message', 'Course successfully added!');
    }
    public function index(){
        $posts = Post::all();

        return view('courses.courses', ['posts'=> $posts]);
    }
    public function show($id){
        $post = Post::find($id);
        return view('courses.view', ['post' => $post]);
    }
    public function categoryView($slug){
        $category = Category::where('slug', $slug)->first();

        if (!$category){
            abort('404', 'Relevant posts are not found!');
        }
        $posts = $category->post;
//        dd($posts);
        return view('courses.courses', ['posts'=> $posts]);
    }





    public function manageAttachment($imageData){
        $mainFolder = 'uploaded-files/';
        if(!is_dir($mainFolder . $imageData['folder_name']) && !mkdir($concurrentDirectory = $mainFolder . $imageData['folder_name'], 0777, true) && !is_dir($concurrentDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
        }
        $file = ($imageData['returnType'] === 'request')?$imageData['data']->file($imageData['request_name']):$imageData['data'];

        if ($file) {
            $name = $imageData['file_name'] . '-' . time() . '.' . $file->clientExtension();
            $file->move($mainFolder . $imageData['folder_name'], $name);

            if ($imageData['returnType'] === 'request') {
                $imageData['data']->request->add([$imageData['request_name_new'] => $mainFolder . $imageData['folder_name'] . '/' . $name]);
                return $imageData['data'];
            }else{
                return $mainFolder.$imageData['folder_name'].'/'.$name;
            }
        }
        return $imageData['data'];
    }
}
