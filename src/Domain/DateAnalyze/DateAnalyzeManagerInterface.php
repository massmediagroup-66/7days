<?php

namespace Domain\DateAnalyze;

use App\Model\DateAnalyze\DateAnalyzeResultModel;
use App\Model\DateAnalyze\DateInputModel;

interface DateAnalyzeManagerInterface
{
    public function getAnalyzeResultModel(DateInputModel $model): DateAnalyzeResultModel;
}
