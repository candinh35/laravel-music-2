<?php

namespace App\Services;

use App\Models\Song;
use App\Services;
use Illuminate\Foundation\Http\FormRequest;

class SongService extends BaseService
{
    /**
     * Category constructor
     */
    public function __construct(Song $song, FileService $fileService)
    {
        $this->fileService = $fileService;
        parent::__construct($song);
    }

    /**
     *  get limit and newest record
     */
    public function getNewSong($limit)
    {
        return $this->model->getLimitNewSong($limit);
    }

    public function deleteSong($id)
    {
        $song = $this->model->findOrFail($id);

        $songImage = $song->image_path;
        $songAudio = $song->audio_path;

        $song->delete();

        $this->fileService->deleteFile($songImage, UPLOAD_IMAGE_PATH);

        $this->fileService->deleteFile($songAudio, UPLOAD_AUDIO_PATH);
    }

    public function getSongFilterByName($filterString)
    {
        return $songs = $this->model->name($filterString)->get();
    }
}
