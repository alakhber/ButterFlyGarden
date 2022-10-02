<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
//HasAdditionalFunctions
trait ControllerTraits
{
    public function change($model, $column = 'status', $value = null)
    {
        try {
            DB::beginTransaction();
            $model->update([$column => is_null($value) ? !$model->{$column} :  $value]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }


    
}
