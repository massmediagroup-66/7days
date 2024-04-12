<?php

namespace Domain\DateAnalyze;

use App\Model\DateAnalyze\DateAnalyzeResultModel;
use App\Model\DateAnalyze\DateInputModel;
use DateTime;
use DateTimeZone;

final class DateAnalyzeManager implements DateAnalyzeManagerInterface
{
    public function getAnalyzeResultModel(DateInputModel $model): DateAnalyzeResultModel
    {
        return (new DateAnalyzeResultModel())
            ->setZoneOffset($this->getZoneOffset($model))
            ->setFebruaryDays($this->getFebruaryDays($model))
            ->setMonthName($this->getMonthName($model))
            ->setMonthDays($this->getMonthDays($model))
        ;
    }

    private function getZoneOffset(DateInputModel $model): int
    {
        $date = new DateTime($model->getDate(), new DateTimeZone($model->getTimezone()));

        return $date->getOffset() / 60;
    }

    private function getFebruaryDays(DateInputModel $model): int
    {
        return (new DateTime($model->getDate()))->format('L') == 1 ? 29 : 28;
    }

    private function getMonthDays(DateInputModel $model): int
    {
        return (new DateTime($model->getDate()))->format('t');
    }

    private function getMonthName(DateInputModel $model): string
    {
        return (new DateTime($model->getDate()))->format('F');
    }
}
