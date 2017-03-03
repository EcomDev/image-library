<?php

namespace spec\EcomDev\Image;

use EcomDev\Image\Resource;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ResourceProxySpec extends ObjectBehavior
{
    private $resource;
    private $callbackTester;

    public function __construct()
    {
        $this->callbackTester = new CallbackTester(function () {
            return $this->resource->getWrappedObject();
        });
    }


    function let(Resource $resource)
    {
        $this->beConstructedWith($this->callbackTester);
        $this->resource = $resource;
    }

    function it_implements_Resource_interface()
    {
        $this->shouldImplement(Resource::class);
    }

    function it_does_not_invoke_factory_on_call()
    {
        $this->shouldNotInvokeCallback();
    }

    function it_creates_resource_on_reveal_call()
    {
        $this->resource->reveal()
            ->shouldBeCalled()
            ->willReturn('My CreatedResource');

        $this->reveal()->shouldReturn('My CreatedResource');

        $this->shouldInvokeCallbackOnce();
    }

    function it_creates_resource_only_once_on_reveal_call()
    {
        $this->resource->reveal()
            ->shouldBeCalled()
            ->willReturn('My CreatedResource');

        $this->reveal()->shouldReturn('My CreatedResource');
        $this->reveal()->shouldReturn('My CreatedResource');

        $this->shouldInvokeCallbackOnce();
    }

    public function getMatchers()
    {
        return $this->callbackTester->getMatchers();
    }
}
