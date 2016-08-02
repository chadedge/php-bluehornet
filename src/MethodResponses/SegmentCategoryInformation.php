<?php

namespace Dawehner\Bluehornet\MethodResponses;

class SegmentCategoryInformation extends ResponseBase
{
    protected $categoryId;

    protected $categoryName;

    protected $categoryType;

    protected $categoryOrder;

    /**
     * Creates a new SegmentCategoryInformation instance.
     * @param $categoryId
     * @param $categoryName
     * @param $categoryType
     * @param $categoryOrder
     */
    public function __construct($categoryId, $categoryName, $categoryType, $categoryOrder)
    {
        $this->categoryId = $categoryId;
        $this->categoryName = $categoryName;
        $this->categoryType = $categoryType;
        $this->categoryOrder = $categoryOrder;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * @return mixed
     */
    public function getCategoryType()
    {
        return $this->categoryType;
    }

    /**
     * @return mixed
     */
    public function getCategoryOrder()
    {
        return $this->categoryOrder;
    }
}
