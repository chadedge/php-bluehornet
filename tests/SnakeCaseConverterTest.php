<?php

namespace Dawehner\Bluehornet\Tests;

use Dawehner\Bluehornet\SnakeCaseConverter;

/**
 * @coversDefaultClass \Dawehner\Bluehornet\SnakeCaseConverter
 */
class SnakeCaseConverterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::normalize
     * @dataProvider providerTestNormalize
     */
    public function testNormalize($property, array $excludes, array $mapping, $expectedProperty)
    {
        $converter = new SnakeCaseConverter($excludes, $mapping);
        $this->assertEquals($expectedProperty, $converter->normalize($property));
    }

    /**
     * @return array
     */
    public function providerTestNormalize()
    {
        $data = [];
        $data['empty-property'] = ['', [], [], ''];
        $data['word'] = ['word', [], [], 'word'];
        $data['two-words'] = ['wordtwo', [], [], 'wordtwo'];
        $data['two-words-underscore'] = ['wordTwo', [], [], 'word_two'];
        $data['leading-underscore'] = ['_wordTwo', [], [], '_word_two'];

        $data['word-mapping'] = ['word', [], ['word' => 'muh'], 'muh'];
        $data['two-word-mapping'] = ['wordTwo', [], ['wordTwo' => 'muh'], 'muh'];

        $data['exclude-word'] = ['word', ['word'], [], 'word'];
        $data['exclude-two-word-underscore'] = ['wordTwo', ['wordTwo'], [], 'wordTwo'];

        return $data;
    }

    /**
     * @covers ::denormalize
     * @dataProvider providerTestDenormalize
     */
    public function testDenormalize($property, array $excludes, array $mapping, $expectedProperty)
    {
        $converter = new SnakeCaseConverter($excludes, $mapping);
        $this->assertEquals($expectedProperty, $converter->denormalize($property));
    }

    /**
     * @return array
     */
    public function providerTestDenormalize()
    {
        $data = [];
        $data['empty-property'] = ['', [], [], ''];
        $data['word'] = ['word', [], [], 'word'];
        $data['two-words'] = ['wordtwo', [], [], 'wordtwo'];
        $data['two-words-underscore'] = ['word_two', [], [], 'wordTwo'];
        $data['leading-underscore'] = ['_word_two', [], [], '_wordTwo'];

        $data['word-mapping'] = ['muh', [], ['word' => 'muh'], 'word'];
        $data['two-word-mapping'] = ['muh', [], ['wordTwo' => 'muh'], 'wordTwo'];

        $data['exclude-word'] = ['word', ['word'], [], 'word'];
        $data['exclude-two-word-underscore'] = ['word_two', ['wordTwo'], [], 'word_two'];
        $data['exclude-two-word-camelcase'] = ['wordTwo', ['wordTwo'], [], 'wordTwo'];

        return $data;
    }

}
