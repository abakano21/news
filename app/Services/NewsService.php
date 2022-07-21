<?php

namespace App\Services;

use Exception;
use App\Interfaces\NewsInterface;
use App\Models\News;

class NewsService implements NewsInterface
{
    /**
     * Get all news
     *
     * @return mixed
     */
    public function index()
    {
        return News::orderBy('created_at', 'DESC')->get();
    }

    /**
     * creates a new news with the given data
     *
     * @param array $data
     * @return Model
     */
    public function store(array $data)
    {        
        $data['user_id'] = auth()->user()->id;        
        return News::create($data);
    }
    
    /**
     * retrieves the News by id
     *
     * @param  int $id
     * @return int
     */
    public function show(News $news)
    {
        return $news;
    }

    /**
     * Edit news
     *
     * @param News $news
     * @param array $data
     * @return bool
     */
    public function update(News $news, array $data)
    {
        return $news->update($data);
    }

    /**
     * @param News $news
     * @return bool|null
     * @throws \Exception
     */
    public function delete(News $news)
    {
        return $news->delete();
    }
}
