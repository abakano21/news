<?php

namespace App\Http\Controllers\Api;

use App\Events\NewsCreatedEvent;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Services\NewsService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public $newsService;
    public function __construct()
    {
        $this->newsService = new NewsService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $this->newsService->index()
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'success' =>  false,
                'message' =>  $ex->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('news.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreNewsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:news',
            'content' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        $news = $this->newsService->store($request->except('_token', '_method'));

        NewsCreatedEvent::dispatch($news);

        return response()->json([
            'success' => true,
            'message' => 'News record successfully created!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $this->newsService->show($news),
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'success' =>  false,
                'message' => $ex->getMessage(),
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Model  $news
     * @return \Illuminate\Http\Response
     */
    // public function edit(News $news)
    // {
    //     return view('news.edit', ['row' => $news]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        try {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255|unique:news,title,' . $news->id,
                'content' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()
                ], 422);
            }

            $this->newsService->update($news, $request->except('_token', '_method'));

            return response()->json([
                'success' => true,
                'message' => 'News record successfully updated!'
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'success' =>  false,
                'message' => $ex->getMessage(),
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try {
            $this->newsService->delete($news);
            return response()->json([
                'success' => true,
                'message' => 'News record successfully deleted!'
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'success' =>  false,
                'message' =>  $ex->getMessage(),
            ], 500);
        }
    }
}
