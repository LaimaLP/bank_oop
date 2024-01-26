<?php

use App\DB\FileBase;
use Bank\App\Controllers\DBTypeController;
use App\DB\MariaBase;


class StatisticsController
{

    public function index($request)
    {


        $writer = match (DBTypeController::get()->getDbType()) {
            DB_JSON => new FileBase('members'),
            DB_MARIA => new MariaBase('accounts'),
        };

        if ($writer === DB_MARIA) {

            $totalBalance = $writer->getTotalBalance();
        }
    }
}
