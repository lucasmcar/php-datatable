<?php

namespace PhpDataTable\Builder;

use PhpDataTable\Paginator\Paginator;

class DataTableBuilder
{

    private $rows;
    private $attrs;
    private $headers;
    private $rowsPerPage;
    private $currentPage;
    private $cssLink;
    private $hasPagination;
    private $paginator;


    public function __construct()
    {
        $this->rows = [];
        $this->attrs = [];
        $this->headers = [];   
        $this->rowsPerPage = 10;
        $this->currentPage = 1;
    }

    /**
     * Add one only row to the Datatable
     * @param array $rows
     */
    public function addRow(array $rows)
    {
        $this->rows[] = $rows;
        return $this;
    }

    /**
     * Add many rows to the Datatable
     * @param array $rows
     */
    public function addRows(array $rows)
    {
        foreach($rows as $row){
            $this->addRow($row);
        }
        return $this;
    }

    /**
     * Set attributes to table like classes, ids, etc
     * @param array $attrs
     */
    public function setAttrs(array $attrs)
    {
        $this->attrs = $attrs; 
        return $this;
    }

    public function tableCss($link)
    {
        $this->cssLink = sprintf("<head><link rel='stylesheet' href='%s'></head>", htmlspecialchars($link, ENT_QUOTES, "UTF-8"));
        return $this;
    }

    public function setHeaders(array $headers) 
    {
        $this->headers = $headers;
        return $this;
    }

    public function renderAttributes()
    {
        $attrStr = '';
        foreach ($this->attrs as $key => $value) {
            $attrStr .= sprintf(' %s="%s"', $key, htmlspecialchars($value, ENT_QUOTES, "UTF-8"));
        }
        return $attrStr;
    }

    public function hasPagination(bool $hasPagination = true)
    {
        $this->hasPagination = $hasPagination;
        return $this;
    }

    public function addPaginator(Paginator $paginator)
    {
        $this->paginator = $paginator;
        return $this;
    }

    /**
     * Render the table on a view
     */
    public function render()
    {
        $offset       = $this->paginator->getOffset();
        $itemsPerPage = $this->paginator->getItemsPerPage();
        $currentRows  = array_slice($this->rows, $offset, $itemsPerPage);
        
        $html = $this->cssLink. ' <table' . $this->renderAttributes() . '>';

        // Render headers
        if (!empty($this->headers)) {
            $html .= '<thead><tr>';
            foreach ($this->headers as $header) {
                $html .= '<th>' . htmlspecialchars($header, ENT_QUOTES, "UTF-8") . '</th>';
            }
            $html .= '</tr></thead>';
        }

        // Render rows
        $html .= '<tbody>';
        foreach ($currentRows as $r) {
            $html .= '<tr>';
            foreach ($r as $cell) {
                $html .= '<td>' . htmlspecialchars($cell, ENT_QUOTES, "UTF-8") . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody>';

        $html .= '</table>';

        // Render pagination
        $html .= $this->paginator->render();

        return $html;
    }

    public function rowsPerPage(int $rows)
    {
        $this->rowsPerPage = $rows;
        return $this;
    }

    public function currentPage(int $currentPage)
    {
        $this->currentPage = $currentPage;
        return $this;
    }
}