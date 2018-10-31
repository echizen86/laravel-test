<?php

namespace FastPBX\ProfileHubSync\Nova;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Gears\ClassFinder;
use Laravel\Nova\Resource;

class Synchronizer extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'FastPBX\ProfileHubSync\Models\Synchronizer';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'label';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Label')->sortable(),
            Select::make('ClassName','class_name')->options(self::getSynchronizers())->rules(['required']),
            Select::make('ModelName','model_name')->options(self::getModels())->rules(['required']),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
            new Actions\RunSync($request)
        ];
    }

    private static function getSynchronizers()
    {
        $composer = require('../vendor/autoload.php');
        $finder = new ClassFinder($composer);
        $defaultClasses = $finder->namespace('FastPBX\\ProfileHubSync\\Jobs\\Synchronizers')->search();
        $customClasses = $finder->namespace('App\\Jobs\\Synchronizers')->search();
        $classes = array_merge($defaultClasses,$customClasses);
        $opts = collect($classes)->mapWithKeys(function ($item) {
            return [$item=>$item];
        });
        return $opts->toArray();
    }

    private static function getModels()
    {
        $composer = require('../vendor/autoload.php');
        $finder = new ClassFinder($composer);
        $classes = $finder->namespace('App\\Models')->search();
        $opts = collect($classes)->mapWithKeys(function ($item) {
            return [$item=>$item];
        });
        return $opts->toArray();
    }

}
