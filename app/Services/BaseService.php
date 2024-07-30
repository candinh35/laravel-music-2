<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use App\Services;
use Illuminate\Http\UploadedFile;
use InvalidArgumentException;

class BaseService
{
    protected $fileService;
    /**
     * @var Model
     */
    protected $model;

    /**
     * base constructor
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     *  get all record
     */
    public function getAll($with = null)
    {
        return $this->model->all();
    }

    /**
     *  get with paginate
     */
    public function getPaginate($perPage, $with = null)
    {
        if ($with) {
            return $this->model->with($with)->orderByDesc(SORT_FIELD)->paginate($perPage);
        }

        return $this->model->orderByDesc(SORT_FIELD)->paginate($perPage);
    }

    /**
     * get by id
     */
    public function getById($id, $with = null)
    {
        if ($with) {
            return $this->model->with($with)->findOrFail($id);
        }

        return $this->model->findOrFail($id);
    }

    public function getPaginateFilterByName($perPage, $with = null, $filterString = null)
    {
        if ($with) {
            return $this->model->with($with)->name($filterString)->orderByDesc(SORT_FIELD)->paginate($perPage);
        }

        return $this->model->name($filterString)->orderByDesc(SORT_FIELD)->paginate($perPage);
    }

    // store
    public function create($data)
    {
        return $this->model->create($data);
    }

    public function createWithFile($data)
    {
        foreach ($data as $key => $value) {
            if ($value instanceof UploadedFile) {
                // get extension of file
                $extension = $value->getClientOriginalExtension();
                // if extension is image, upload to images folder
                $uploadFolder = '';
                if (in_array($extension, IMAGE_EXTENSION)) {
                    $uploadFolder = UPLOAD_IMAGE_PATH;
                } else {
                    $uploadFolder = UPLOAD_AUDIO_PATH;
                }
                $data[$key] = $this->fileService->uploadFile($value, $data['name'], $value->extension(), $uploadFolder);
            }
        }

        $this->create($data);
    }

    // update
    public function update($data, $id)
    {
        $model = $this->model->findOrFail($id);
        $model->fill($data);
        $model->save();
        return $model;
    }

    public function updateWithFile($data, $id)
    {
        $model = $this->model->findOrFail($id);
        // dd($data);
        foreach ($data as $key => $value) {
            if ($value instanceof UploadedFile) {
                // get extension of file
                $extension = $value->getClientOriginalExtension();
                // extension is image, upload to images folder
                $uploadFolder = '';
                if (in_array($extension, IMAGE_EXTENSION)) {
                    $uploadFolder = UPLOAD_IMAGE_PATH;
                } else {
                    $uploadFolder = UPLOAD_AUDIO_PATH;
                }
                // remove old file
                $this->fileService->deleteFile($model->$key, $uploadFolder);
                // upload new file
                $data[$key] = $this->fileService->uploadFile($value, $data['name'], $value->extension(), $uploadFolder);
            }
        }
        // fill model
        $model->fill($data);
        $model->save();
        return $model;
    }

    // delete
    public function delete($id)
    {
        $model = $this->model->findOrFail($id);
        $model->delete();
    }
}
