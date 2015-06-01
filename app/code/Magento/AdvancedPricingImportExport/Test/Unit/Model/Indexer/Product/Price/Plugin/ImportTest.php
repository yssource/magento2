<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\AdvancedPricingImportExport\Test\Unit\Model\Indexer\Product\Price\Plugin;

class ImportTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Magento\Indexer\Model\IndexerInterface |\PHPUnit_Framework_MockObject_MockObject
     */
    protected $indexer;

    /**
     * @var \Magento\AdvancedPricingImportExport\Model\Indexer\Product\Price\Plugin\Import |\PHPUnit_Framework_MockObject_MockObject
     */
    protected $import;

    public function setUp()
    {
        $this->indexer = $this->getMockForAbstractClass('\Magento\Indexer\Model\IndexerInterface', [], '', false);
        $this->import = $this->getMock(
            '\Magento\AdvancedPricingImportExport\Model\Indexer\Product\Price\Plugin\Import',
            ['getPriceIndexer', 'invalidateIndexer'],
            [],
            '',
            false
        );
        $this->import->expects($this->any())->method('getPriceIndexer')->willReturn($this->indexer);
    }

    public function testAfterSaveAdvancedPricing()
    {
        $this->indexer->expects($this->once())->method('isScheduled')->willReturn(false);
        $this->import->expects($this->once())->method('invalidateIndexer');

        $this->import->afterSaveAdvancedPricing();
    }

    public function testAfterDeleteAdvancedPricing()
    {
        $this->indexer->expects($this->once())->method('isScheduled')->willReturn(false);
        $this->import->expects($this->once())->method('invalidateIndexer');

        $this->import->afterSaveAdvancedPricing();
    }
}
