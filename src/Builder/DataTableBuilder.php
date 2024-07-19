<?php

namespace PhpDataTable\Builder;

class DataTableBuilder
{

    private $rows;
    private $attrs;
    private $headers;
    private $rowsPerPage;
    private $currentPage;
    private $cssLink;

    public function __construct()
    {
        $this->rows = [];
        $this->attrs = [];
        $this->headers = [];   
        $this->rowsPerPage = 10;
        $this->currentPage = 1;
    }

    public function addRow(array $rows)
    {
        $this->rows[] = $rows;
        return $this;
    }

    public function addRows(array $rows)
    {
        foreach($rows as $row){
            $this->addRow($row);
        }
        return $this;
    }

    public function setAttrs(array $attrs)
    {
        $this->attrs = $attrs; 
        return $this;
    }

    public function tableCss($link)
    {
        $this->cssLink = sprintf("<head><link rel='stylesheet' href='%s'></head>", htmlspecialchars($link));
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
            $attrStr .= sprintf(' %s="%s"', $key, htmlspecialchars($value));
        }
        return $attrStr;
    }



    public function render()
    {
        $start = ($this->currentPage - 1) * $this->rowsPerPage;
        $currentRows = array_slice($this->rows, $start, $this->rowsPerPage);

        $html = $this->cssLink . '<table' . $this->renderAttributes() . '>';

        // Render headers
        if (!empty($this->headers)) {
            $html .= '<thead><tr>';
            foreach ($this->headers as $header) {
                $html .= '<th>' . htmlspecialchars($header) . '</th>';
            }
            $html .= '</tr></thead>';
        }

        // Render rows
        $html .= '<tbody>';
        foreach ($currentRows as $r) {
            $html .= '<tr>';
            foreach ($r as $cell) {
                $html .= '<td>' . htmlspecialchars($cell) . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</tbody>';

        $html .= '</table>';

        // Render pagination
        $html .= $this->showPagination();

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

    private function showPagination() {
        $totalRows = count($this->rows);
        $totalPages = ceil($totalRows / $this->rowsPerPage);
        $pagination = '<ul class="pagination">';

        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $this->currentPage) {
                $pagination .= '
                    <li class="page-item disabled">
                        <a class="page-link">'.$i.' </a>
                    </li> ';
            } else {
                $pagination .= '<a class="page-link" href="?page=' . $i . '">' . $i . '</a> ';
            }
        }

        $pagination .= '</ul>';
        return $pagination;
    }

}