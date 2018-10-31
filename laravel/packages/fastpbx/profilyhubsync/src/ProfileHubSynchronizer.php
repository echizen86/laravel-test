<?php

namespace FastPBX\ProfileHubSync;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProfileHubSynchronizer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $model_name;
    protected $query_size = 1000;
    protected $query_pattern = [ 'match_all' => [ "boost" => 1 ] ];
    protected $query_index = null;
    protected $query_type = null;

    /**
     * Create a new job instance.
     *
     * @param  String $model_name
     * @return void
     */
    public function __construct(String $model_name)
    {
        $this->model_name = $model_name;

        $this->query_index = config('profilehubsync.index');
        $this->query_type = config('profilehubsync.type');

    }

    public function queryElasticSearch()
    {
        $data = [
            'body' => [
                'size' => $this->query_size,
                'query' => $this->query_pattern
            ],
            'index' => $this->query_index,
            'type' => $this->query_type
        ];

        $results = \Elasticsearch::search($data);

        if  ( !$results['hits']['total'] ) return [];

        return $results['hits']['hits'];

    }

    public function mapResults($results)
    {
        return collect($results)->map(function ($item) {
            return [
                'id' => $item['_id'],
                'label' => $item['_source']['label']
            ];
        });

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        // Query ElasticSearch Using Default Settings
        $results = $this->queryElasticSearch();

        // Map ElasticSearch Results To Expected Form
        $data = $this->mapResults($results);

        // Create Destination Objects With Data
        collect($data)->each(function ($item, $key) {
            $this->model_name::firstOrCreate($item);
        });

    }

    public function parseServices($type,$services)
    {
        $data = [];
        foreach ( $services as $service )
        {
            if ( $service['service_type'] == $type )
            {
                $data[] = $service['raw'];
            }
        }
        return $data;
    }

    /**
     * Get the tags that should be assigned to the job.
     *
     * @return array
     */
    public function tags()
    {
        return ['synchronizers'];
    }

}
