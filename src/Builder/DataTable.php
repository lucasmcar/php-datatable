<?php 

namespace PhpDataTable\Builder;

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

    public function pagination(bool $show, $pages = 1)
    {
        if($show == true)
        {
            $this->builder->rowsPerPage($pages);
            return $this;
        }

       
        return false;
    }

    public function current($currentPage)
    {
        $this->builder->currentPage($currentPage);
        return $this;
    }

    public function render()
    {
        return $this->builder->render();
    }
}