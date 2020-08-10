<?php


namespace syhcode\tpTransformer\Pagination;


use League\Fractal\Pagination\PaginatorInterface;
use think\Paginator;

class ThinkphpPaginatorAdapter implements PaginatorInterface
{

    protected $paginator;

    public function __construct(Paginator $paginator)
    {
        $this->paginator = $paginator;
    }

    public function getCurrentPage()
    {
        // TODO: Implement getCurrentPage() method.
        return $this->paginator->currentPage();
    }

    public function getLastPage()
    {
        // TODO: Implement getLastPage() method.
        return $this->paginator->lastPage();
    }

    public function getTotal()
    {
        // TODO: Implement getTotal() method.
        return $this->paginator->total();
    }

    public function getCount()
    {
        // TODO: Implement getCount() method.
        return $this->paginator->count();
    }

    public function getPerPage()
    {
        // TODO: Implement getPerPage() method.
        return $this->paginator->listRows();
    }

    public function getUrl($page)
    {
        // TODO: Implement getUrl() method.
        return $this->paginator->getUrlRange($this->getPerPage(),$this->getLastPage());
    }

    public function getPaginator()
    {
        return $this->paginator;
    }
}