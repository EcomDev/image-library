<?php

namespace spec\EcomDev\Image;

class CallbackTester
{
    private $callSequence = [];

    private $callback;

    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }


    public function __invoke(...$args)
    {
        $this->callSequence[] = $args;
        return ($this->callback)(...$args);
    }

    public function getMatchers()
    {
        return [
            'invokeCallback' => function () {
                return count($this->callSequence) > 0;
            },
            'invokeCallbackOnce' => function () {
                return count($this->callSequence) === 1;
            },
            'invokeCallbackTimes' => function ($subject, $times) {
                return count($this->callSequence) === $times;
            },
            'invokeCallbackWithArgs' => function ($subject, ...$args) {
                return in_array($args, $this->callSequence, true);
            }
        ];
    }

    public function reset()
    {
        $this->callSequence = [];
    }
}
