<?php namespace Starter\Http\Controllers\Blog;

use Starter\Facades\CommentRepository;
use Starter\Facades\PostRepository;
use Starter\Http\Controllers\Controller;
use Starter\Http\Requests;
use Starter\Http\Requests\BlogFormRequest;
use Starter\Models\Post;

use Illuminate\Http\Request;

class BlogController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Blog Frontend Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the static "pages"
	|
	*/

    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = 'Blog';
        $posts = PostRepository::with(['user'])->paginate();
        $links = PostRepository::links();

        return view('blog.index')->with(compact('title','posts','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('blog.posts.create')->withTitle('Create a new post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(BlogFormRequest $request)
    {
        $data = array(
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'description' => $request->get('description'),
            'user_id' => \Auth::user()->id
        );
        PostRepository::create($data);
        return \Redirect::route('blog.create')->with('message', 'Your post has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $title = 'Blog';
        $post = PostRepository::find($id);

        return view('blog.show')->with(compact('title','post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
