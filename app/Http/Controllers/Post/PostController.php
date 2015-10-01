<?php namespace Starter\Http\Controllers\Post;

use Illuminate\Http\Response;
use Starter\Facades\CommentRepository;
use Starter\Facades\PostRepository;
use Starter\Http\Controllers\Controller;
use Starter\Http\Requests;
use Starter\Http\Requests\BlogFormRequest;
use Starter\Models\Post;

class PostController extends Controller {

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

        return view('post.index')->with(compact('title','posts','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('posts.create')->withTitle('Create a new post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PostFormRequest $request)
    {
        $data = array(
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'description' => $request->get('description'),
            'user_id' => \Auth::user()->id
        );
        PostRepository::create($data);
        return \Redirect::route('post.create')->with('message', 'Your post has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  PostRepository  $post
     * @return Response
     */
    public function show(PostRepository $post)
    {
        $title = 'Blog';

        return view('post.show')->with(compact('title','post'));
    }

}
