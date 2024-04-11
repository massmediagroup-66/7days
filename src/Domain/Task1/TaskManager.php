<?php

namespace Domain\Task1;

use App\Model\Task1\ResultModel;
use App\Model\Task1\TaskModel;
use DateTime;
use DateTimeZone;

class TaskManager
{
    public function getResultModel(TaskModel $model): ResultModel
    {
        return (new ResultModel())
            ->setA($this->getZoneOffset($model))
            ->setB($this->getFebruaryDays($model))
            ->setC($this->getMonthName($model))
            ->setD($this->getMonthDays($model))
        ;
    }

    private function getZoneOffset(TaskModel $model): int
    {
        $date = new DateTime($model->getDate(), new DateTimeZone($model->getTimezone()));

        return $date->getOffset() / 60;
    }

    private function getFebruaryDays(TaskModel $model): int
    {
        return (new DateTime($model->getDate()))->format('L') == 1 ? 29 : 28;
    }

    private function getMonthDays(TaskModel $model): int
    {
        return (new DateTime($model->getDate()))->format('t');
    }

    private function getMonthName(TaskModel $model): string
    {
        return (new DateTime($model->getDate()))->format('F');
    }
}
