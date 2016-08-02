<?php

namespace Dawehner\Bluehornet\MethodResponses;

class TransactionalListTemplates extends ResponseBase
{
    /**
     * @var \Dawehner\Bluehornet\MethodResponses\TransactionalListTemplate[]
     */
    protected $items;

    /**
     * Creates a new TransactionalListTemplates instance.
     *
     * @param TransactionalListTemplate[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * @return TransactionalListTemplate[]
     */
    public function getItems()
    {
        return $this->items;
    }
}
