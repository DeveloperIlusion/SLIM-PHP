<?php

namespace App\Models;

final class CategoryModel
{
    private $id;
    private $Categoria;
    private $Descricao;
    private $Status;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCategory(): string
    {
        return $this->Categoria;
    }

    public function setCategory(string $Categoria): CategoryModel
    {
        $this->Categoria = $Categoria;
    }

    public function getDescription(): string
    {
        return $this->Descricao;
    }

    public function setDescription(string $Descricao): CategoryModel
    {
        $this->Descricao = $Descricao;
    }

    public function getStatus(): int
    {
        return $this->Status;
    }

    public function setStatus(int $Status): CategoryModel
    {
        $this->Status = $Status;
    }
}