<?php

namespace Oy\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class QueryFilters
{
    protected $request;
    protected $builder;
    protected $functions;
    protected $global;

    public function __construct(Request $request){
        $this->request = $request;
        $this->functions = new Collection();
        $this->global = [];
    }

    public function apply(Builder $builder, array $extraFilter = null){
        $this->builder = $builder;

        $filters = $extraFilters ? array_merge($this->filters(), $extraFilters) : $this->filters();

        foreach ($filters as $key => $value) {
            if (!method_exists($this, $key)) {
                continue;
            }
            if (isset($value)) {
                $this->$key($value);
            } else {
                $this->$key();
            }
        }

        return $this->builder;
    }

    public function filters(){ return array_merge($this->global, $this->request->all()); }

    public function add(string $key, ?string $value = null){
        $this->global[$key] = $value;
        return $this;
    }

    public function transform(Model $model){
        return $this->functions->reduce(function($model, $function) {
            return $function($model);
        }, $model);
    }

    protected function defer(\Closure $function){
        $this->functions->push($function);
        return $this;
    }

    public function request(){
        return $this->request;
    }

}
