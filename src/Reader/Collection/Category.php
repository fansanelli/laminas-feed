<?php

/**
 * @see       https://github.com/laminas/laminas-feed for the canonical source repository
 * @copyright https://github.com/laminas/laminas-feed/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-feed/blob/master/LICENSE.md New BSD License
 */

namespace Laminas\Feed\Reader\Collection;

class Category extends AbstractCollection
{

    /**
     * Return a simple array of the most relevant slice of
     * the collection values. For example, feed categories contain
     * the category name, domain/URI, and other data. This method would
     * merely return the most useful data - i.e. the category names.
     *
     * @return array
     */
    public function getValues()
    {
        $categories = array();
        foreach ($this->getIterator() as $element) {
            if (isset($element['label']) && !empty($element['label'])) {
                $categories[] = $element['label'];
            } else {
                $categories[] = $element['term'];
            }
        }
        return array_unique($categories);
    }
}
