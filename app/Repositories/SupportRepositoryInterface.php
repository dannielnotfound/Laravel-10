<?php

namespace App\Repositories;

use App\DTO\Supports\{
    CreateSupportDTO,
    UpdateSupportDTO
};
use App\Repositories\PaginationInterface;
use stdClass;

interface SupportRepositoryInterface
{

    public function paginate(int $pages = 1, int $totalPerPage = 10, string $filter = null): PaginationInterface;

    public function getAll(string $filter = null): array;

    public function findOne(string $id): stdClass|null;    

    public function new(CreateSupportDTO $dto): stdClass;
    
    public function update(UpdateSupportDTO $dto): stdClass|null;

    public function delete(string $id): void;

}