<?php

namespace Dawehner\Bluehornet\MethodResponses;

class SegmentGroupInformation extends ResponseBase
{
    protected $groupName;

    protected $groupId;

    protected $groupOrder;

    protected $groupHidden;

    protected $categoryId;

    /**
     * Creates a new SegmentGroupInformation instance.
     * @param $group_name
     * @param $groupId
     * @param $groupOrder
     * @param $groupHidden
     */
    public function __construct($groupName, $groupId, $groupOrder, $groupHidden, $categoryId)
    {
        $this->groupName = $groupName;
        $this->groupId = $groupId;
        $this->groupOrder = $groupOrder;
        $this->groupHidden = $groupHidden;
        $this->categoryId = $categoryId;
    }

    /**
     * @return mixed
     */
    public function getGroupName()
    {
        return $this->groupName;
    }

    /**
     * @return mixed
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @return mixed
     */
    public function getGroupOrder()
    {
        return $this->groupOrder;
    }

    /**
     * @return mixed
     */
    public function getGroupHidden()
    {
        return $this->groupHidden;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }
}
