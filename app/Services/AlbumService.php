<?php

namespace App\Services;

use App\Models\Album;
use App\Services;
use Illuminate\Foundation\Http\FormRequest;

class AlbumService extends BaseService
{

    /**
     * Category constructor
     */
    public function __construct(Album $album, FileService $fileService)
    {
        $this->fileService = $fileService;
        parent::__construct($album);
    }

    /**
     *  get limit and newest record
     */
    public function getNewAlbum($limit)
    {
        return $this->model->getLimitNewAlbum($limit);
    }

    public function deleteAlbum($id)
    {
        $album = $this->model->findOrFail($id);

        $albumImage = $album->image_path;

        $album->delete();

        $this->fileService->deleteFile($albumImage, UPLOAD_IMAGE_PATH);
    }
}
