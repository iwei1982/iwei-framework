<?php
/**
 * Created by PhpStorm.
 * User: tanwei
 * Date: 2017/11/19
 * Time: 21:36
 */

namespace Iwei\Component\HttpKernel;

use Iwei\Component\HttpFoundation\Request;
use Iwei\Component\HttpFoundation\Response;

interface HttpKernelInterface
{
    const MASTER_REQUEST = 1;
    const SUB_REQUEST = 2;



    public function handle(Request $request,$type = self::MASTER_REQUEST,$catch = true);

}