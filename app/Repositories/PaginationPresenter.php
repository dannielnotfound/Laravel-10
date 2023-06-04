<?php

namespace App\Repositories;
use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class PaginationPresenter implements PaginationInterface
{

    /**
     * 
     * @var stdClass[]
     */
    private array $items;

    public function __construct(
        protected LengthAwarePaginator $paginator
    )
    {
        $this->items = $this->arrayItemsToObject($this->paginator->items());
    }

    public function items(): array
    {
        # Transformar cada valor dentro do array em stdClass (object)

        return $this->items;

        // return arrayItemsToObject($this->items);

        // return $this->paginator->items();
    }

    public function total(): int
    {
        return $this->paginator->total() ?? 0;
    }

    public function isFirstPage(): bool
    {
        return $this->paginator->onFirstPage();
    }

    public function isLastPage(): bool
    {
        return $this->paginator->onLastPage();
    }

    public function currentPage(): int
    {
        return $this->paginator->currentPage() ?? 0;
    }

    public function getNumberPreviousPage(): int
    {
        return $this->paginator->currentPage() - 1;
    }

    public function getNumberNextPage(): int
    {
        return $this->paginator->currentPage() + 1;
    }

    private function arrayItemsToObject(array $items): array
    {
        # This method returns each object from a each array index (value)

        # $response is an array that contain a stdClass from each value from array $items. $items is all items in the pagination, captured by method $this->paginator->items()
        $response = [];
        foreach ($items as $item) {
            $stdClassObject = new stdClass;
            foreach($item->toArray() as $key => $value){
                $stdClassObject->{$key} = $value;
            }
            array_push($response, $stdClassObject);
        }
        
        return $response;
    }   
}