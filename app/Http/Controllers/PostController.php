<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/12/28
 * Time: 14:59
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * 显示创建博客文章的表单。
     *
     * @return Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * 保存一个新的博客文章。
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // 验证以及保存博客文章...
        $this->validate($request, [
            'title' => 'bail|required|unique:posts|max:255',
            'body' => 'required',
        ]);
    }

}