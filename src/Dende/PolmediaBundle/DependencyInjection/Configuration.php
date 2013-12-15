<?php

namespace Dende\PolmediaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface {

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('polmedia');

        $rootNode
            ->children()
                ->scalarNode('mainImageDir')
                ->defaultValue('/uploads/mainImage/') // or whatever default value
                ->end()
                
                ->scalarNode('thumbnailDir')
                ->defaultValue('/uploads/thumbnail/') // or whatever default value
                ->end()
                
                ->scalarNode('galleryDir')
                ->defaultValue('/uploads/gallery/') // or whatever default value
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }

}
