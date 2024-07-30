<?php

namespace App\Services;

use App\Models\Category;
use App\Services;
use Illuminate\Foundation\Http\FormRequest;

class CategoryService extends BaseService
{
    /**
     * Category constructor
     */
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }
}
