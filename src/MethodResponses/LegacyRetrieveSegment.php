<?php

namespace Dawehner\Bluehornet\MethodResponses;

class LegacyRetrieveSegment extends ResponseBase
{
    /**
     * @var SegmentGroupInformation[]
     */
    protected $groupInformation;

    /**
     * @var SegmentCategoryInformation[]
     */
    protected $categoryInformation;

    /**
     * Creates a new LegacyRetrieveSegment instance.
     * @param SegmentGroupInformation[] $groupInformation
     * @param SegmentCategoryInformation[] $categoryInformation
     */
    public function __construct(array $groupInformation = [], array $categoryInformation = [])
    {
        $this->groupInformation = $groupInformation;
        $this->categoryInformation = $categoryInformation;
    }

    /**
     * @return SegmentGroupInformation[]
     */
    public function getGroupInformation() {
        return $this->groupInformation;
    }

    /**
     * @return SegmentCategoryInformation[]
     */
    public function getCategoryInformation()
    {
        return $this->categoryInformation;
    }
}
