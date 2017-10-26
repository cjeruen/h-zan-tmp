<?php

namespace ZanPHP\NovaClient;

class ClientContext
{
    private $reqServiceName;
    private $reqMethodName;
    private $reqSeqNo;
    private $attachmentContent;
    private $outputStruct;
    private $exceptionStruct;
    private $packer;
    private $cb;
    private $task;
    private $startTime;//us
    private $traceHandle;
    private $debuggerTraceTid;

    /**
     * @return mixed
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param mixed $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @return mixed
     */
    public function getCb()
    {
        return $this->cb;
    }

    /**
     * @param mixed $cb
     */
    public function setCb($cb)
    {
        $this->cb = $cb;
    }

    /**
     * @return mixed
     */
    public function getPacker()
    {
        return $this->packer;
    }

    /**
     * @param mixed $packer
     */
    public function setPacker($packer)
    {
        $this->packer = $packer;
    }

    /**
     * @return mixed
     */
    public function getReqServiceName()
    {
        return $this->reqServiceName;
    }

    /**
     * @param mixed $reqServiceName
     */
    public function setReqServiceName($reqServiceName)
    {
        $this->reqServiceName = $reqServiceName;
    }

    /**
     * @return mixed
     */
    public function getReqMethodName()
    {
        return $this->reqMethodName;
    }

    /**
     * @param mixed $reqMethodName
     */
    public function setReqMethodName($reqMethodName)
    {
        $this->reqMethodName = $reqMethodName;
    }

    /**
     * @return mixed
     */
    public function getReqSeqNo()
    {
        return $this->reqSeqNo;
    }

    /**
     * @param mixed $reqSeqNo
     */
    public function setReqSeqNo($reqSeqNo)
    {
        $this->reqSeqNo = $reqSeqNo;
    }

    /**
     * @return mixed
     */
    public function getAttachmentContent()
    {
        return $this->attachmentContent;
    }

    /**
     * @param mixed $attachmentContent
     */
    public function setAttachmentContent($attachmentContent)
    {
        $this->attachmentContent = $attachmentContent;
    }

    /**
     * @return mixed
     */
    public function getOutputStruct()
    {
        return $this->outputStruct;
    }

    /**
     * @param mixed $outputStruct
     */
    public function setOutputStruct($outputStruct)
    {
        $this->outputStruct = $outputStruct;
    }

    /**
     * @return mixed
     */
    public function getExceptionStruct()
    {
        return $this->exceptionStruct;
    }

    /**
     * @param mixed $exceptionStruct
     */
    public function setExceptionStruct($exceptionStruct)
    {
        $this->exceptionStruct = $exceptionStruct;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     */
    public function setStartTime()
    {
        $this->startTime = microtime(true);
    }

    /**
     * @return mixed
     */
    public function getTraceHandle()
    {
        return $this->traceHandle;
    }

    /**
     * @param mixed $traceHandle
     */
    public function setTraceHandle($traceHandle)
    {
        $this->traceHandle = $traceHandle;
    }

    public function getDebuggerTraceTid()
    {
        return $this->debuggerTraceTid;
    }

    public function setDebuggerTraceTid($tid)
    {
        $this->debuggerTraceTid = $tid;
    }

}