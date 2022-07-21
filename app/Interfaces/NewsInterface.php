<?php

namespace App\Interfaces;

use App\Models\News;

interface NewsInterface
{
    public function index();
    public function store(array $data);
    public function show(News $news);
    public function update(News $news, array $data);
    public function delete(News $news);   
}