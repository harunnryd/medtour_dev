<?php

namespace App\Models\Observers;

use Illuminate\Support\Arr;
use App\Models\Observers\Contracts\ObserverInterface;

class EntityObserver implements ObserverInterface {

    public function creating($model) {
        //
    }

    public function created($model) {
        // app('log')->info(__CLASS__. " - Berhasil menambah $model ");
    }

    public function updating($model) {
        //
    }

    public function updated($model) {
        // app('log')->info(__CLASS__. " - Berhasil mengubah $model ");
    }

    public function saving($model) {
        //
    }

    public function saved($model) {
        // app('log')->info('[TEST SAVED]'.$model->doctor->specializations);

    }

    public function deleting($model) {
        //
    }

    public function deleted($model) {
        app('log')->info(__CLASS__. " - Berhasil menghapus data ");
    }

    public function restoring($model) {
        //
    }

    public function restored($model) {
        app('log')->info(__CLASS__. " - Berhasil mengembalikan $model ");
    }
}
