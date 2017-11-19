<?php
/**
 * Created by PhpStorm.
 * User: tanwei
 * Date: 2017/11/19
 * Time: 21:48
 */

namespace Iwei\Component\HttpKernel;
use Iwei\Component\HttpFoundation\Request;


class HttpKernel implements HttpKernelInterface
{

    protected $dispatcher; //url调度
    protected $resolver;
    protected $requestStack;
    protected $argumentResolver;

    public function __construct(EventDispatcherInterface $dispatcher,ControllerResolerInterface $resoler,RequestStack $requestStack = null,ArgumentResolerInterface $argumentResoler = null)
    {
        $this->dispatcher = $dispatcher;
        $this->resolver   = $resoler;
        $this->requestStack = $requestStack ? $requestStack : new RequestStack();
        if(null === $this->argumentResolver)
        {
            $this->argumentResolver = $resoler;
        }
    }


    public function handle(Request $request, $type = self::MASTER_REQUEST, $catch = true)
    {
        // TODO: Implement handle() method.
    }

}