<?php

namespace App\Services\Stage;

use App\Repositories\StageRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use League\Config\Exception\ValidationException;

class StageService
{
    public function __construct(
        private readonly StageRepository $repository,
    ){
    }

    public function createStagesIfNotExists(array $stages,int $funnel_id): void
    {
        DB::beginTransaction();
        try{
            foreach ($stages as $stage) {
                $this->repository->firstOrCreate([
                    'title' => $stage['title'],
                    'bitrix_id' => $stage['bitrixId'],
                    'funnel_id' => $funnel_id
                ]);
            }
            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            Log::channel('')->error($e->getMessage());
        }
    }

    public function getStages()
    {

    }
}
