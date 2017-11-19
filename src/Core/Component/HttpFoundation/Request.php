<?php
/**
 * Created by PhpStorm.
 * User: tanwei iwei1982.tan@jkhxc.cn
 * Date: 2017/11/19
 * Time: 21:43
 */

namespace Iwei\Component\HttpFoundation;


class Request
{
    const HEADER_FORWARDED = 0b00001; // When using RFC 7239
    const HEADER_X_FORWARDED_FOR = 0b00010;
    const HEADER_X_FORWARDED_HOST = 0b00100;
    const HEADER_X_FORWARDED_PROTO = 0b01000;
    const HEADER_X_FORWARDED_PORT = 0b10000;
    const HEADER_X_FORWARDED_ALL = 0b11110; // All "X-Forwarded-*" headers
    const HEADER_X_FORWARDED_AWS_ELB = 0b11010; // AWS ELB doesn't send X-Forwarded-Host

    /** @deprecated since version 3.3, to be removed in 4.0 */
    const HEADER_CLIENT_IP = self::HEADER_X_FORWARDED_FOR;
    /** @deprecated since version 3.3, to be removed in 4.0 */
    const HEADER_CLIENT_HOST = self::HEADER_X_FORWARDED_HOST;
    /** @deprecated since version 3.3, to be removed in 4.0 */
    const HEADER_CLIENT_PROTO = self::HEADER_X_FORWARDED_PROTO;
    /** @deprecated since version 3.3, to be removed in 4.0 */
    const HEADER_CLIENT_PORT = self::HEADER_X_FORWARDED_PORT;

    const METHOD_HEAD         = 'HEAD';
    const METHOD_GET          = 'GET';
    const METHOD_POST         = 'POST';
    const METHOD_PUT          = 'PUT';
    const METHOD_PATCH        = 'PATCH';
    const METHOD_DELETE       = 'DELETE';
    const METHOD_PURGE        = 'PURGE';
    const METHOD_OPTIONS      = 'OPTIONS';
    const METHOD_TRACE        = 'TRACE';
    const METHOD_CONNECT      = 'CONNECT';

    protected  $request;
    protected $query;
    protected $attributes;
    protected $cookies;
    protected $files;
    protected $server;
    protected $headers;
    protected $content;

    /**
     * Request constructor.
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param null $content
     */
    public function __construct(array $query = [],array $request = [],$attributes = [],array $cookies = [],array $files = [],array $server= [],$content = null)
    {
       $this->initialize($query,$request,$attributes,$cookies,$files,$server,$content);
    }

    /**
     * @param array $query
     * @param array $request
     * @param array $attributes
     * @param array $cookies
     * @param array $files
     * @param array $server
     * @param array|null $content
     */
    protected function initialize(array $query,array $request,array $attributes,array $cookies,array $files, array $server,array $content = null)
    {

        $this->request = new ParameterBag($request);
        $this->query = new ParameterBag($query);
        $this->attributes = new ParameterBag($attributes);
        $this->cookies = new ParameterBag($cookies);
        $this->files = new FileBag($files);
        $this->server = new ServerBag($server);
        $this->headers = new HeaderBag($this->server->getHeaders());

        $this->content = $content;


    }

}