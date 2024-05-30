<?php

namespace App\Services\Sms;

use App\Exceptions\PhoneVerification\PhoneAuthSmsServiceNotFoundException;

class SmsService
{
    protected SmsServiceInterface $smsService;


    public function __construct(SmsServiceInterface $smsService = null)
    {
        if(is_null($smsService)) {
            $smsServiceClass = config("phone_verification.sms_service.class");

            if(!class_exists($smsServiceClass)) {
                throw new PhoneAuthSmsServiceNotFoundException("Service " . config("phone_verification.sms_service.class") . " not found");
            }

            $this->smsService = new $smsServiceClass();
            $this->smsService->settings(config("phone_verification.sms_service.settings"));
        }
    }

    /**
     * @return SmsServiceInterface
     */
    public function smsService() : SmsServiceInterface {
        return $this->smsService;
    }
}
