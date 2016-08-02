<?php

namespace Dawehner\Bluehornet\MethodRequests;

class LegacyRetrieveSegment extends MethodBase
{
    /**
     * {@inheritdoc}
     */
    protected $methodName = 'legacy.retrieve_segment';

    /**
     * @var null|int
     */
    protected $returnGroupData;

    /**
     * @var null|int
     */
    protected $returnCategoryData;

    /**
     * Creates a new TransactionalListTemplates instance.
     * @param null $returnGroupData
     * @param null $returnCategoryData
     */
    public function __construct($returnGroupData = null, $returnCategoryData = null)
    {
        $this->returnGroupData = $returnGroupData;
        $this->returnCategoryData = $returnCategoryData;
    }

}

