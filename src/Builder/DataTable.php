<?php 

namespace PhpDataTable\Builder;

use PhpDataTable\Paginator\Paginator;

class DataTable 
{
    private $builder;

    public function __construct()
    {
        $this->builder = new DataTableBuilder();
    }

    public function setHeaders(array $headers)
    {
        $this->builder->setHeaders($headers);
        return $this;
    }

    public function rows(array $rows)
    {
        $this->builder->addRows($rows);
        return $this;
    }

    public function row(array $rows)
    {
        return $this->builder->addRow($rows);
        return $this;
    }

    public function setAttributes(array $attributes)
    {
        $this->builder->setAttrs($attributes);
        return $this;
    }

    public function setCss($link)
    {
        $this->builder->tableCss($link);
        return $this;
    }

    public function setPaginator(Paginator $paginator)
    {
        return $this->builder->addPaginator($paginator);
        return $this;
    }

    public function render()
    {
        return $this->builder->render();
    }
}