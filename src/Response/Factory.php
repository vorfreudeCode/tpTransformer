<?php


namespace syhcode\tpTransformer\Response;


use League\Fractal\Manager;
use syhcode\tpTransformer\Pagination\ThinkphpPaginatorAdapter;
use think\model\Collection;
use think\Paginator;
use think\Response;

class Factory
{
    protected $manager;
    protected $resource;
    public function __construct()
    {
        $this->manager = new Manager();

//        $resource = app('syhcode\tpTransformer\Serializer');
//
//        $this->manager->setSerializer(new $resource());


    }

    public function item($item,$transformer,$resourceKey=null){

        $resource = new \League\Fractal\Resource\Item($item,new $transformer,$resourceKey);

        $array = $this->manager->createData($resource);

        return Response::create($array,'json',200);
    }

    /**
     * 返回一个集合
     * @param $collection
     * @param $transformer
     * @param string $resourceKey
     * @return Response
     */
    public function collection(Collection $collection,$transformer,$resourceKey=null){
        $resource = new \League\Fractal\Resource\Collection($collection,new $transformer,$resourceKey);

        $array = $this->manager->createData($resource);

        return Response::create($array,'json',200);
    }


    public function paginator(Paginator $paginator,$transformer,$resourceKey=null){
        $collection = $paginator->getCollection();
        $resource = new \League\Fractal\Resource\Collection($collection,new $transformer,$resourceKey);
        $resource->setPaginator(new ThinkphpPaginatorAdapter($paginator));
        $array = $this->manager->createData($resource);

        return Response::create($array,'json',200);
    }


    /**
     * 无内容响应
     * @return Response
     */
    public function noContent()
    {
        return Response::create('', 'json', 204);
    }

    /**
     * 创建一个自定义返回信息和状态码
     * @param $message 返回信息
     * @param $statusCode 状态码
     * @return Response
     */
    public function error($message,$statusCode){
        return Response::create($message,'json',$statusCode);
    }




}