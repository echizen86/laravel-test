<?php

namespace FastPBX\ProfileHubSync\Jobs\Synchronizers;

class NumbersSync extends \FastPBX\ProfileHubSync\ProfileHubSynchronizer {

    public function mapResults($results)
    {

        $numbers = [];

        foreach ($results as $item) {

            $profile = $item['_source'];

            if ( array_key_exists('service', $profile ) && array_key_exists('services', $profile['service'] ) )
            {
                $parsedServices = $this->parseServices('number', $profile['service']['services']);

                foreach ( $parsedServices as $service ) {
                    $service = array_except($service, ['ts_updated','ts_saved']);
                    $service['profile_id'] =  $profile['id'];
                    $numbers[] = $service;
                }

            }

        };

        return $numbers;

    }

}