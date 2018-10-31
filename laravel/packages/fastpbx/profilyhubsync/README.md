###Register Nova Resource
Add The Following To The App/Providers/NovaServiceProvider

```
use FastPBX\ProfileHubSync\Nova\Synchronizer;
```

Need To OverWrite Novas Resource Registration

```
/**
 * Register the application's Nova resources.
 *
 * @return void
 */
protected function resources()
{
    // !!!!! This Needs To Be Included For Nova To Load Any Local Resources
    Nova::resourcesIn(app_path('Nova'));

    Nova::resources([
        Synchronizer::class
    ]);
}
```

###Publish Config File
```
php artisan vendor:publish --provider="FastPBX\ProfileHubSync\ProfileHubSyncProvider"
```