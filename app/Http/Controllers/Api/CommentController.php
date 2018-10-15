<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $comments = Comment::whereHas('post', function ($query) use ($id) {
            $query->where('id', $id);
        })->with('user')->orderBy('created_at', 'desc')->paginate(10);

        return $comments;
    }
}
