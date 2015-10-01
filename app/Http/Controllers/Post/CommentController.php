<?php namespace Starter\Http\Controllers\Post;

use Starter\Facades\CommentRepository;
use Starter\Http\Controllers\Controller;
use Starter\Http\Requests;
use Starter\Http\Requests\CommentFormRequest;

class CommentController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Blog Comment Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles operations for comments
	|
	*/

    /**
     * Display a listing of the comments.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new comment.
     *
     * @return Response
     */
    public function create()
    {
        return view('blog.posts.create')->withTitle('Create a new post');
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param Requests\CommentFormRequest $request
     * @return Response
     */
    public function store($postId, CommentFormRequest $request)
    {
        $data = [
            'content' => $request->get('content'),
            'post_id' => $postId,
            'user_id' => \Auth::user()->id
        ];
        CommentRepository::create($data);
        return \Redirect::route('blog.show', [$postId])->with('message', 'Your comment has been added!');
    }

    /**
     * Show the form for editing the specified comment.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified comment in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
