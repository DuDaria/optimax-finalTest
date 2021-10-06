<?php

namespace Step;

use ApiTester;

class TesterTriangle extends ApiTester
{
    /** @var string  */
    public const URL = '/triangle/possible';

    /** @var array */
    public array $params;

    /**
     * @return void
     */
    public function getIsTriangle(): void
    {
        $this->params = array(
            'a' => 2,
            'b' => 3,
            'c' => 5,
        );

        $this->sendGet(self::URL . http_build_query($this->params));
    }

    /**
     * @return void
     */
    public function getNotExistTriangle(): void
    {
        $this->params = array(
            'a' => 1,
            'b' => 3,
            'c' => 1,
        );

        $this->sendGet(self::URL . http_build_query($this->params));
    }

    /**
     * @return void
     */
    public function getUnrealTriangle(): void
    {
        $this->params = array(
            'a' => 10,
        );

        $this->sendGet(self::URL . http_build_query($this->params));
        $data = $this->grabResponse();
        var_dump($data);
    }

    //-----------------------------------------------------------------
    //negative
    /**
     * @return void
     */
    public function getFloatParamsTriangle(): void
    {
        $this->params = array(
            'a' => 2.5,
            'b' => 3.5,
            'c' => 5.5
        );

        $this->sendGet(self::URL . http_build_query($this->params));
    }

    /**
     * @return void
     */
    public function getNegativeParamsTriangle(): void
    {
        $this->params = array(
            'a' => -5,
            'b' => -10,
            'c' => -20
        );

        $this->sendGet(self::URL . http_build_query($this->params));
    }

    /**
     * @return void
     */
    public function getEmptyTriangle(): void
    {
        $this->sendGet(self::URL);
    }

    /**
     * @return void
     */
    public function getAllNullParamsTriangle():void
    {
        $this->params = array(
            'a' => 0,
            'b' => 0,
            'c' => 0
        );

        $this->sendGet(self::URL . http_build_query($this->params));
    }

    /**
     * @return void
     */
    public function getTwoNullParamsTriangle():void
    {
        $this->params = array(
            'a' => 5,
            'b' => 0,
            'c' => 0
        );

        $this->sendGet(self::URL . http_build_query($this->params));
    }

    /**
     * @return void
     */
    public function getOneNullParamTriangle():void
    {
        $this->params = array(
            'a' => 0,
            'b' => 10,
            'c' => 10
        );

        $this->sendGet(self::URL . http_build_query($this->params));
    }

    /**
     * @return void
     */
    public function getTwoParamsTriangle():void
    {
        $this->params = array(
            'a' => 10,
            'b' => 10,
        );

        $this->sendGet(self::URL . http_build_query($this->params));
    }

    /**
     * @return void
     */
    public function getTwoParamsOneStrTriangle():void
    {
        $twoParamsOneStr = $this->params = array(
            'a' => 10,
            'b' => 'ggggggggg',
        );

        $this->sendGet(self::URL . http_build_query( $twoParamsOneStr));
    }

    /**
     * @return void
     */
    public function getParamsStringTriangle():void
    {
        $this->params = array(
            'a' => 'lllll',
            'b' => 'ddd',
            'c' => 'hhhhh',
        );

        $this->sendGet(self::URL . http_build_query($this->params));
    }

    /**
     * @return void
     */
    public function getNewParamsTriangle():void
    {
        $this->params = array(
            'a' => 10,
            'b' => 10,
            'c' => 5,
            'd' => 20,
        );

        $this->sendGet(self::URL . http_build_query($this->params));
    }
    /**
     * @return void
     */
    public function getParamsJSONTriangle():void
    {
        $this->params = array(
            'a' => 10,
            'b' => 5,
            'c' => 5,
        );

        $this->haveHttpHeader('Content-Type', 'application/json');
        $this->sendPost(self::URL , $this->params);
    }
}
