<?php

class Paginator
{
   // public int $page = 1;
    public int $itemsOnPage = 1;
    public int $numberOfItems = 0;
    public int $shownPaginatorPages = 3;

    public function CurrentPage(): int {
        $currentPage = $_GET['p'] ?? 1;
        if ((int)$currentPage < 1) {
            $currentPage = 1;
        }
        if ((int)$currentPage > $this->NumberOfPages()) {
            $currentPage = $this->NumberOfPages();
        }
        return $currentPage;
    }

    public function NumberOfPages(): int
    {
        return ceil($this->numberOfItems / $this->itemsOnPage);
    }

    public function ItemToBegin(): int
    {
        return ($this->CurrentPage() - 1) * $this->itemsOnPage;
    }

    public function SqlQueryLIMIT()
    {
        return $this->ItemToBegin() . ', ' . $this->itemsOnPage;
    }

    public function ShownPaginatorPages(): int
    {
        return $this->shownPaginatorPages < $this->NumberOfPages()
            ? $this->shownPaginatorPages
            : $this->NumberOfPages();
    }


    public function StartPaginator(): int
    {
        $start = 1;
        if ($this->CurrentPage() - floor($this->ShownPaginatorPages() / 2) > 1) {
            $start = $this->CurrentPage() - floor($this->ShownPaginatorPages() / 2);
        }

        if (($this->NumberOfPages() - $this->CurrentPage()) < floor($this->ShownPaginatorPages() / 2)) {
            $start = $this->NumberOfPages() - $this->ShownPaginatorPages() + 1;
        }

        return $start;
    }

    public function EndPaginator(): int
    {
        return ($this->StartPaginator() + $this->ShownPaginatorPages()) <= $this->NumberOfPages()
            ? $this->StartPaginator() + $this->ShownPaginatorPages()
            : $this->NumberOfPages() + 1;
    }

    public function PreviousPage(): int {
        return ($this->CurrentPage() - 1) > 0
            ? $this->CurrentPage() - 1
            : 1;
    }

    public function NextPage(): int {
        return ($this->CurrentPage() + 1) > $this->NumberOfPages()
            ? $this->NumberOfPages()
            : $this->CurrentPage() + 1;
    }
}