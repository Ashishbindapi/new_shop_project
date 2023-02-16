<?php
    class ImageController
    {
       private $model;
       public function __construct(ImageModel $model)
       {
        $this->model = $model;
       }

       public function saveImage($data)
       {
        $this->model->saveImage($data);
       }
    }