<?php
/**
 * Resource Helper Class
 */
namespace Helper;

use Symfony\Component\Finder\Finder;

class Resource {

    protected $resources_dir;
    protected $resources;

    public function __construct($resources_dir = null)
    {
        $this->resources_dir = $resources_dir ?: __DIR__ . "/../resources";
        $this->resources = array();
    }

    public function loadResources()
    {
        $finder = new Finder();
        $finder->files()->in($this->resources_dir)->name('*.jpg');

        foreach ($finder as $file) {
            $this->resources[] = $file->getFileName();
        }

        return $this->resources;
    }

    public function getResourcesDir()
    {
        return $this->resources_dir;
    }

    public function getResources()
    {
        return $this->resources;
    }

    public function getRandom()
    {
        if (!count($this->resources))
            $this->loadResources();

        return $this->resources_dir . "/" . $this->resources[array_rand($this->resources)];
    }
}