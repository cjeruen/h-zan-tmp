<?php

namespace Kdt\Iron\Nova\Network;

class ClientContext
{
    private $ClientContext;

    public function __construct()
    {
        $this->ClientContext = new \ZanPHP\NovaClient\ClientContext();
    }

    public function getTask()
    {
        $this->ClientContext->getTask();
    }

    public function setTask($task)
    {
        $this->ClientContext->setTask($task);
    }

    public function getCb()
    {
        $this->ClientContext->getCb();
    }

    public function setCb($cb)
    {
        $this->ClientContext->setCb($cb);
    }

    public function getPacker()
    {
        $this->ClientContext->getPacker();
    }

    public function setPacker($packer)
    {
        $this->ClientContext->setPacker($packer);
    }

    public function getReqServiceName()
    {
        $this->ClientContext->getReqServiceName();
    }

    public function setReqServiceName($reqServiceName)
    {
        $this->ClientContext->setReqServiceName($reqServiceName);
    }

    public function getReqMethodName()
    {
        $this->ClientContext->getReqMethodName();
    }

    public function setReqMethodName($reqMethodName)
    {
        $this->ClientContext->setReqMethodName($reqMethodName);
    }

    public function getReqSeqNo()
    {
        $this->ClientContext->getReqSeqNo();
    }

    public function setReqSeqNo($reqSeqNo)
    {
        $this->ClientContext->setReqSeqNo($reqSeqNo);
    }

    public function getAttachmentContent()
    {
        $this->ClientContext->getAttachmentContent();
    }

    public function setAttachmentContent($attachmentContent)
    {
        $this->ClientContext->setAttachmentContent($attachmentContent);
    }

    public function getOutputStruct()
    {
        $this->ClientContext->getOutputStruct();
    }

    public function setOutputStruct($outputStruct)
    {
        $this->ClientContext->setOutputStruct($outputStruct);
    }

    public function getExceptionStruct()
    {
        $this->ClientContext->getExceptionStruct();
    }

    public function setExceptionStruct($exceptionStruct)
    {
        $this->ClientContext->setExceptionStruct($exceptionStruct);
    }

    public function getStartTime()
    {
        $this->ClientContext->getStartTime();
    }

    public function setStartTime()
    {
        $this->ClientContext->setStartTime();
    }

    public function getTraceHandle()
    {
        $this->ClientContext->getTraceHandle();
    }

    public function setTraceHandle($traceHandle)
    {
        $this->ClientContext->setTraceHandle($traceHandle);
    }

    public function getDebuggerTraceTid()
    {
        $this->ClientContext->getDebuggerTraceTid();
    }

    public function setDebuggerTraceTid($tid)
    {
        $this->ClientContext->setDebuggerTraceTid($tid);
    }

}