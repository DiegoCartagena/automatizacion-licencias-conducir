<?php

namespace Transbank\TransaccionCompleta\Responses;

use Transbank\Utils\Utils;

class MallTransactionRefundResponse
{
    public $type;
    public $authorizationCode;
    public $authorizationDate;
    public $nullifiedAmount;
    public $balance;
    public $responseCode;

    public function __construct($json)
    {
        $this->type = Utils::returnValueIfExists($json, 'type');
        $this->authorizationCode = Utils::returnValueIfExists($json, 'authorization_code');
        $this->authorizationDate = Utils::returnValueIfExists($json, 'authorization_date');
        $this->nullifiedAmount = Utils::returnValueIfExists($json, 'nullified_amount');
        $this->balance = Utils::returnValueIfExists($json, 'balance');
        $this->responseCode = Utils::returnValueIfExists($json, 'response_code');
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     *
     * @return MallTransactionRefundResponse
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * @param mixed $authorizationCode
     *
     * @return MallTransactionRefundResponse
     */
    public function setAuthorizationCode($authorizationCode)
    {
        $this->authorizationCode = $authorizationCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationDate()
    {
        return $this->authorizationDate;
    }

    /**
     * @param mixed $authorizationDate
     *
     * @return MallTransactionRefundResponse
     */
    public function setAuthorizationDate($authorizationDate)
    {
        $this->authorizationDate = $authorizationDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNullifiedAmount()
    {
        return $this->nullifiedAmount;
    }

    /**
     * @param mixed $nullifiedAmount
     *
     * @return MallTransactionRefundResponse
     */
    public function setNullifiedAmount($nullifiedAmount)
    {
        $this->nullifiedAmount = $nullifiedAmount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     *
     * @return MallTransactionRefundResponse
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResponseCode()
    {
        return (int) $this->responseCode;
    }

    /**
     * @param mixed $responseCode
     *
     * @return MallTransactionRefundResponse
     */
    public function setResponseCode($responseCode)
    {
        $this->responseCode = $responseCode;

        return $this;
    }
}
