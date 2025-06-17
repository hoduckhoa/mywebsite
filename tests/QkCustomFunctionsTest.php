<?php
use PHPUnit\Framework\TestCase;

class QkCustomFunctionsTest extends TestCase
{
    public function test_dotted_divider1_returns_expected_html()
    {
        $expected = '<div class="clearfix divider_dashed1"></div>';
        $this->assertEquals($expected, dotted_divider1());
    }
}
