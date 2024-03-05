<?php

namespace App\Services\Deal;

use App\Repositories\DealRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Nette\Schema\ValidationException;
use Prettus\Validator\Exceptions\ValidatorException;

class DealService
{
    public function __construct(
        private readonly DealRepository $repository
    ){
    }

    public function storeTransfers($deals): void
    {
        DB::beginTransaction();
        try {
            $this->repository->create([

            ]);
            DB::commit();
        } catch (ValidatorException $e) {
            Log::channel('store_transfers')->error($e->getMessage());
            DB::rollBack();
        }
    }
}
