<?php

namespace FastPBX\ProfileHubSync\Nova\Actions;

use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;

class RunSync extends Action
{
    use InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var $model
     */
    protected $current_model_name;
    private $id;

    public function __construct($request)
    {
        $refArray = explode('/', $request->headers->get('referer') );
        $this->id = end($refArray);
    }

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        foreach ($models as $model) {
            $model->class_name::dispatch($model->model_name);
        }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
