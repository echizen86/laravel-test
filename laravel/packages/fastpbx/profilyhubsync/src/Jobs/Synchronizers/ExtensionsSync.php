<?php

namespace FastPBX\ProfileHubSync\Jobs\Synchronizers;

class ExtensionsSync extends \FastPBX\ProfileHubSync\ProfileHubSynchronizer {

    public function mapResults($results)
    {

        $extensions = [];

        foreach ( $results as $item ) {

            $profile = $item['_source'];

            if ( array_key_exists('service', $profile ) && array_key_exists('services', $profile['service'] ) )
            {
                $parsedServices = $this->parseServices('ext', $profile['service']['services']);

                foreach ( $parsedServices as $service ) {
                    $service['profile_id'] =  $profile['id'];
                    $extensions[] = $service;
                }

            }

        };

        return $extensions;

    }

}