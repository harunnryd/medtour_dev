<?php

namespace App\Models\Observers;

use App\Models\Observers\Contracts\ObserverInterface;

class ProvinceObserver implements ObserverInterface {

    public function creating($model) {
        //
    }

    public function created($model) {
        //log
        app('log')->info(__CLASS__. " - Berhasil menambah $model ");
        //slug
        $model->slug = str_slug($model->name);
        $model->save();
    }

    public function updating($model) {
        $model->slug = str_slug($model->name);
    }

    public function updated($model) {
        app('log')->info(__CLASS__. " - Berhasil mengubah $model ");
    }

    public function saving($model) {
        //untuk mengecek apakah value sudah terisi benar
        if ($model->exists && $model->isDirty('name')) {
            $model->slug = str_slug($model->name);
        }
    }

    public function saved($model) {
        app('log')->info(__CLASS__. " - Berhasil menyimpan $model ");
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