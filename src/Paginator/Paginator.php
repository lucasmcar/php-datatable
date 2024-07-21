<?php

namespace PhpDataTable\Paginator;

class Paginator
{
    private $totalItems;
    private $itemsPerPage;
    private $currentPage;
    private $totalPages;
    private $cssClass;

    public function __construct($totalItems, $itemsPerPage, $currentPage) 
    {
        $this->totalItems = $totalItems;
        $this->itemsPerPage = $itemsPerPage;
        $this->currentPage = $currentPage;
        $this->totalPages = ceil($totalItems / $itemsPerPage);
    }

    public function getOffset() 
    {
        return ($this->currentPage - 1) * $this->itemsPerPage;
    }

    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }

    public function getTotalPages() 
    {
        return $this->totalPages;
    }

    public function getCurrentPage() 
    {
        return $this->currentPage;
    }

    public function getTotalItems()
    {
        return $this->totalItems;
    }

    public function render() 
    {
        $html = '<ul class="pagination">';

        for ($i = 1; $i <= $this->totalPages; $i++) {
            if ($i == $this->currentPage) {
                $html .= '
                    <li class="page-item disabled">
                        <a class="page-link">'.$i.' </a>
                    </li>';
            } else {
                $html .= '
                    <li>
                        <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
                    </li>
                ';
            }
        }

        $html .= '</ul>';
        return $html;
    }
}