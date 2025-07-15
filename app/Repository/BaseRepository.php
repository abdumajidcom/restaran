<?php

declare(strict_types=1);

namespace App\Repository;

use Illuminate\Contracts\Container\BindingResolutionException;

abstract class BaseRepository
{

    /**
     * @var mixed|null
     */
    protected $model;

    /**
     * @throws BindingResolutionException
     */
    public function __construct()
    {
        $this->model = $this->initialize();
    }

    abstract public function getModel(): string;

    /**
     * @throws BindingResolutionException
     */
    public function initialize()
    {
       if (class_exists($this->getModel())) {
           return app()->make($this->getModel());
       }
    }

}
