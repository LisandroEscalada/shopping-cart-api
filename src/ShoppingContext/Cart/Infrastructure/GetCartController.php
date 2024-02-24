<?php

declare(strict_types=1);

namespace Src\ShoppingContext\Cart\Infrastructure;

use Illuminate\Http\Request;
use Src\ShoppingContext\Cart\Application\GetCartUseCase;
use Src\ShoppingContext\Cart\Infrastructure\Repositories\EloquentCartRepository;

final class GetCartController
{
    private $repository;

    public function __construct(EloquentCartRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $cartId = (int)$request->id;

        $getProductUseCase = new GetCartUseCase($this->repository);
        $cart           = $getProductUseCase->__invoke($cartId);

        return $cart;
    }
}
