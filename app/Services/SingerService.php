<?php

namespace App\Services;

use App\Models\Singer;
use App\Services;
use Illuminate\Foundation\Http\FormRequest;

class SingerService extends BaseService
{
    /**
     * Category constructor
     */
    public function __construct(Singer $singer, FileService $fileService)
    {
        $this->fileService = $fileService;
        parent::__construct($singer);
    }

    /**
     *  get limit and newest record
     */
    public function getNewSinger($limit)
    {
        return $this->model->getLimitNewSinger($limit);
    }

    public function deleteSinger($id)
    {
        $singer = $this->model->find($id);

        $singerImage = $singer->image_path;

        $singer->delete();

        $this->fileService->deleteFile($singerImage, UPLOAD_IMAGE_PATH);
    }

    public function getSingerFilterByName($filterString)
    {
        return $this->model->name($filterString)->get();
    }
}
