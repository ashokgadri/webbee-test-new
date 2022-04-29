<?php

namespace App\Repositories\Event;

use App\Models\Event;
use Carbon\Carbon;

class EventRepository
{
    public function __construct(private Event $model)
    {
    }

    public function getEvents()
    {
        return $this->model->get();
    }

    public function getEventsWithWorkshops()
    {
        return $this->model->with('workshops')->get();
    }

    public function getFutureEventsWithWorkshops()
    {
        return $this->model->withAndWhereHas('workshops', function ($query) {
            $query->where('start', '>=', Carbon::now());
        })->get();
    }
}
