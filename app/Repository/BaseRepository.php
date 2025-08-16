<?php

declare(strict_types=1);

namespace App\Repository;

use Exception;
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
     * @throws Exception
     */
    public function initialize()
    {
       if (class_exists($this->getModel())) {
           return app()->make($this->getModel());
       }
       throw new Exception($this->getModel());
    }

}
